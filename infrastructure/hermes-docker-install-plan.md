# Hermes Agent — Docker Install Plan
**Date:** 2026-04-26  
**Host:** Hostinger VPS (Ubuntu)  
**Branch context:** VPS stack planning for integrity.quest

---

## Stack Overview

```
Hostinger VPS (Ubuntu)
├── CSF Firewall (v15.05)
├── Docker Engine
│   └── Hermes Agent container
│       ├── MCP server (WordPress integration)
│       └── Skills directory (~/.hermes/skills/)
└── WordPress
    └── wp-json REST API (consumed by Hermes via MCP)
```

## Prerequisites

- Docker Engine installed (via Hostinger Docker Application Catalog or manual install)
- Docker Compose v2
- Ports 80/443 open and routed to WordPress (Nginx reverse proxy)
- CSF Docker exemptions applied (see `firewall-snapshot-2026-04-26.md`)

---

## Step 1 — Install Docker via Hostinger Catalog

1. Log in to Hostinger VPS panel → **Applications** → **Docker Application Catalog**
2. Select **Docker Engine** → Deploy
3. Verify: `docker --version` and `docker compose version`

If manual install is needed (Ubuntu):
```bash
curl -fsSL https://get.docker.com | sh
systemctl enable --now docker
usermod -aG docker $USER
```

---

## Step 2 — Pull and Configure Hermes

```bash
# Create Hermes working directory
mkdir -p ~/.hermes/skills

# Pull the Hermes image
docker pull hermes-agent:latest   # replace with actual registry path

# Create docker-compose.yml
cat > ~/hermes/docker-compose.yml << 'EOF'
version: "3.9"
services:
  hermes:
    image: hermes-agent:latest
    container_name: hermes
    restart: unless-stopped
    environment:
      - HERMES_MCP_ENDPOINT=https://integrity.quest/wp-json
      - HERMES_SOUL_PATH=/config/SOUL.md
      - HERMES_SKILLS_PATH=/skills
    volumes:
      - ~/.hermes/skills:/skills:ro
      - ~/.hermes/SOUL.md:/config/SOUL.md:ro
    ports:
      - "127.0.0.1:8080:8080"   # MCP port, localhost-only; Nginx proxies externally
    networks:
      - hermes-net

networks:
  hermes-net:
    driver: bridge
EOF
```

**Key decisions:**
- MCP port `8080` bound to `127.0.0.1` only — never exposed directly; Nginx handles TLS termination and proxying
- SOUL.md and skills are mounted read-only to prevent runtime mutation
- `restart: unless-stopped` ensures Hermes survives VPS reboots

---

## Step 3 — SOUL.md Configuration

`~/.hermes/SOUL.md` is the ethical floor document Hermes loads at startup. It should embed the IQ Charter commitments so all Hermes responses operate within the Cross-Cultural AI Integrity Charter's principles.

See `soul-md-config-plan.md` (next document) for full content spec.

---

## Step 4 — WordPress MCP Integration

Hermes connects to WordPress via the REST API:

```
GET  https://integrity.quest/wp-json/wp/v2/posts
POST https://integrity.quest/wp-json/hermes/v1/respond
```

Required WordPress side:
- Custom REST route registered by a lightweight plugin (`hermes-mcp-bridge`)
- Application Password generated for Hermes (stored as Docker secret or env var)
- CORS restricted to `127.0.0.1` (Hermes container only)

---

## Step 5 — Nginx Reverse Proxy for MCP Endpoint

Add to Nginx config (`/etc/nginx/sites-available/integrity.quest`):

```nginx
location /hermes/ {
    proxy_pass         http://127.0.0.1:8080/;
    proxy_set_header   Host $host;
    proxy_set_header   X-Real-IP $remote_addr;
    proxy_set_header   X-Forwarded-For $proxy_add_x_forwarded_for;
    proxy_set_header   X-Forwarded-Proto $scheme;

    # Restrict to authenticated WordPress sessions only
    auth_request       /wp-json/hermes/v1/auth;
}
```

---

## Step 6 — Charter Skills Directory

Charter documents placed in `~/.hermes/skills/` are loaded as Hermes knowledge modules:

```
~/.hermes/skills/
├── iq-charter-core.md          # Charter principles
├── iq-charter-concordance.md   # Concordance index
└── iq-charter-framework.md     # 3F integrity framework
```

These files are sourced from this repository's `charter/`, `analysis/`, and `framework/` directories. A sync script keeps them current:

```bash
#!/bin/bash
# /usr/local/bin/sync-hermes-skills.sh
REPO=/opt/cross-cultural-ai-integrity-charter
SKILLS=~/.hermes/skills

cp "$REPO/charter/"*.md   "$SKILLS/"
cp "$REPO/framework/"*.md "$SKILLS/"
docker restart hermes
```

Schedule via cron: `0 3 * * * /usr/local/bin/sync-hermes-skills.sh`

---

## Step 7 — Startup Verification

```bash
docker compose -f ~/hermes/docker-compose.yml up -d
docker logs hermes --tail 50
curl -s http://127.0.0.1:8080/health | jq .
```

Expected health response:
```json
{
  "status": "ok",
  "soul_loaded": true,
  "skills_count": 3,
  "mcp_connected": true
}
```

---

## Security Checklist

- [ ] MCP port not exposed externally (localhost-only bind)
- [ ] SOUL.md mounted read-only
- [ ] WordPress Application Password stored as Docker secret (not plain env var in production)
- [ ] CSF Docker exemptions applied
- [ ] Nginx auth_request gate on `/hermes/` location
- [ ] Hermes container runs as non-root user
- [ ] Log rotation configured for Docker container logs
