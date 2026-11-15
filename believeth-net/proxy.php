<?php
/**
 * proxy.php — OpenRouter API relay for believeth.net
 *
 * Keeps the API key server-side. Receives JSON from the browser,
 * forwards it to OpenRouter, and streams the response back.
 *
 * Setup: set OPENROUTER_API_KEY as a server environment variable.
 * Never put the key in this file. Also protect this folder with a
 * login (nginx basic auth) so only admins can reach it.
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: ' . ($_SERVER['HTTP_HOST'] ?? '*'));
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed.']);
    exit;
}

// Daily limits so a stranger (or a bug) cannot run up the bill.
// Counts live in the system temp folder, one small file per day.
$daily_total_max = 150;   // all visitors together
$daily_ip_max    = 30;    // per visitor address
$day   = gmdate('Ymd');
$ip    = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$files = [
    sys_get_temp_dir() . "/bnet_trial_{$day}_all.cnt"                    => $daily_total_max,
    sys_get_temp_dir() . '/bnet_trial_' . $day . '_' . md5($ip) . '.cnt' => $daily_ip_max,
];
foreach ($files as $f => $max) {
    $n = is_file($f) ? (int) file_get_contents($f) : 0;
    if ($n >= $max) {
        http_response_code(429);
        echo json_encode(['error' => 'Daily limit reached. Please try again tomorrow.']);
        exit;
    }
}
foreach ($files as $f => $max) {
    $n = is_file($f) ? (int) file_get_contents($f) : 0;
    file_put_contents($f, (string) ($n + 1), LOCK_EX);
}

$api_key = getenv('OPENROUTER_API_KEY');
if (!$api_key) {
    http_response_code(500);
    echo json_encode(['error' => 'Service not configured.']);
    exit;
}

$raw = file_get_contents('php://input');
$body = json_decode($raw, true);

if (!$body || empty($body['model']) || empty($body['messages'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request body.']);
    exit;
}

// Allowlist of permitted OpenRouter model IDs
$allowed_models = [
    'anthropic/claude-sonnet-4.6',
    'openai/gpt-4o',
    'google/gemini-3.5-flash',
];

if (!in_array($body['model'], $allowed_models, true)) {
    http_response_code(400);
    echo json_encode(['error' => 'Model not permitted.']);
    exit;
}

$payload = json_encode([
    'model'       => $body['model'],
    'messages'    => $body['messages'],
    'max_tokens'  => 1024,
]);

$ch = curl_init('https://openrouter.ai/api/v1/chat/completions');
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $payload,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 60,
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $api_key,
        'HTTP-Referer: https://believeth.net',
        'X-Title: believeth.net',
    ],
]);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_error = curl_error($ch);
curl_close($ch);

if ($curl_error) {
    http_response_code(502);
    echo json_encode(['error' => 'Upstream connection failed.']);
    exit;
}

http_response_code($http_code);
echo $response;
