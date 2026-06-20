<?php
/**
 * proxy.php — OpenRouter API relay for believeth.net
 *
 * Keeps the API key server-side. Receives JSON from the browser,
 * forwards it to OpenRouter, and streams the response back.
 *
 * Setup: set OPENROUTER_API_KEY in your environment or replace
 * the getenv() call with the key string directly.
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

$api_key = getenv('OPENROUTER_API_KEY');
if (!$api_key) {
    // Fallback: hard-code the key here during initial setup.
    // Replace this string with your actual key, then prefer
    // moving it to an environment variable.
    $api_key = 'YOUR_OPENROUTER_API_KEY';
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
    'anthropic/claude-sonnet-4-6',
    'anthropic/claude-opus-4',
    'openai/gpt-4o',
    'openai/gpt-4o-mini',
    'google/gemini-flash-1.5',
    'google/gemini-pro-1.5',
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
