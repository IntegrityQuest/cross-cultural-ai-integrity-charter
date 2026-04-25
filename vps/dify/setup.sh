#!/bin/bash
# Deploy Dify on AlmaLinux 9 + DirectAdmin + OpenLiteSpeed
# Run as root from /opt/dify
#
# Prerequisites:
#   - Docker installed (dnf install docker-ce, systemctl start docker)
#   - docker-compose-plugin installed
#   - .env file created from .env.example and filled in
#   - CSF firewall already configured (no extra ports needed — OLS proxies)

set -e

DEPLOY_DIR="/opt/dify"
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

echo "==> Dify setup started: $(date)"

# ── 1. Install Docker if not present ─────────────────────────────────────────
if ! command -v docker &>/dev/null; then
    echo "==> Installing Docker..."
    dnf install -y dnf-plugins-core
    dnf config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo
    dnf install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
    systemctl enable --now docker
    echo "==> Docker $(docker --version) installed."
else
    echo "==> Docker already installed: $(docker --version)"
fi

# ── 2. Copy files to deploy dir ───────────────────────────────────────────────
echo "==> Copying Dify config to $DEPLOY_DIR..."
mkdir -p "$DEPLOY_DIR"
cp "$SCRIPT_DIR/docker-compose.yml" "$DEPLOY_DIR/"
cp -r "$SCRIPT_DIR/nginx" "$DEPLOY_DIR/"

if [ ! -f "$DEPLOY_DIR/.env" ]; then
    if [ -f "$SCRIPT_DIR/.env" ]; then
        cp "$SCRIPT_DIR/.env" "$DEPLOY_DIR/.env"
    else
        echo "ERROR: $DEPLOY_DIR/.env not found."
        echo "       Copy .env.example to .env and fill in all required values."
        exit 1
    fi
fi

# ── 3. Create volume directories ──────────────────────────────────────────────
echo "==> Creating volume directories..."
mkdir -p "$DEPLOY_DIR/volumes/app/storage"
mkdir -p "$DEPLOY_DIR/volumes/db/data"
mkdir -p "$DEPLOY_DIR/volumes/redis/data"
mkdir -p "$DEPLOY_DIR/volumes/weaviate"
chmod 750 "$DEPLOY_DIR/volumes"

# ── 4. Pull images and start stack ───────────────────────────────────────────
echo "==> Pulling Docker images (this takes a few minutes)..."
cd "$DEPLOY_DIR"
docker compose pull

echo "==> Starting Dify stack..."
docker compose up -d

# ── 5. Wait for api to be ready ───────────────────────────────────────────────
echo "==> Waiting for Dify API to be ready..."
for i in $(seq 1 30); do
    if curl -sf http://127.0.0.1:8080/health &>/dev/null; then
        echo "==> Dify API is up."
        break
    fi
    echo "    Attempt $i/30 — waiting 5s..."
    sleep 5
done

# ── 6. CSF — no new ports needed ─────────────────────────────────────────────
echo "==> Firewall: no new ports needed (Docker uses 127.0.0.1:8080 internally)."
echo "    OLS handles 80/443 → 127.0.0.1:8080 via reverse proxy."

# ── 7. Summary ────────────────────────────────────────────────────────────────
echo ""
echo "==> Dify is running!"
echo ""
echo "    Stack status:     docker compose -f $DEPLOY_DIR/docker-compose.yml ps"
echo "    Logs:             docker compose -f $DEPLOY_DIR/docker-compose.yml logs -f"
echo ""
echo "    Next steps:"
echo "    1. Create subdomain 'dify' in DirectAdmin for believeth.net"
echo "    2. Request Let's Encrypt cert for dify.believeth.net via DirectAdmin"
echo "    3. Add OLS reverse proxy config (see ols-vhost.conf)"
echo "    4. Open https://dify.believeth.net — first run will prompt admin setup"
echo "    5. In Dify: Settings -> Model Providers -> add Claude / OpenAI / OpenRouter"
echo ""
echo "    API keys to add in Dify UI:"
echo "      Claude (Anthropic):  Settings -> Model Providers -> Anthropic"
echo "      OpenAI:              Settings -> Model Providers -> OpenAI"
echo "      OpenRouter:          Settings -> Model Providers -> OpenRouter"
echo ""
