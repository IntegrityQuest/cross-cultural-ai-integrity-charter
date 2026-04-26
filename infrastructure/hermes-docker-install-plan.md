# Hermes Agent — Hostinger Deployment Plan
**Updated:** 2026-04-26  
**Source:** Hostinger Application Catalog + NousResearch/hermes-agent docs  
**Host:** Hostinger VPS (Ubuntu)

---

## Stack Overview

```
Hostinger VPS (Ubuntu)
├── CSF Firewall (v15.05)
├── Docker Manager (managed by Hostinger)
│   ├── Traefik (reverse proxy — auto-deployed with Hermes)
│   └── hermes-agent container
│       ├── CLI interface (via docker compose exec)
│       ├── SOUL.md  →  /opt/data/SOUL.md
│       └── Skills   →  /opt/data/skills/
└── WordPress
    └── wp-json REST API (connected via MCP config)
```

---

## Step 1 — Deploy from Application Catalog

1. Open VPS dashboard → **Docker Manager → Catalog**
2. Search for **Hermes Agent** → click **Select**
3. Enter your LLM API key (Anthropic recommended for IQ Charter alignment)
4. Click **Deploy**

Hostinger automatically creates and starts the container plus Traefik. No manual Docker setup needed.

---

## Step 2 — Access the Container

From your VPS dashboard, open **Browser Terminal**, then:

```bash
# Navigate to the project directory (replace xxxx with your project ID)
cd /docker/hermes-agent-xxxx/

# Enter the running container
docker compose exec -it hermes-agent /bin/bash
```

Once inside, you have direct access to the Hermes CLI. Type `/help` to see available commands.

---

## Step 3 — Place SOUL.md

The Hermes data directory inside the container is `/opt/data`. SOUL.md belongs at:

```
/opt/data/SOUL.md
```

**Option A — copy from this repo on the host (recommended):**

```bash
# On the VPS host (outside container), find the volume mount path
docker inspect hermes-agent | grep -A5 '"Mounts"'

# Then copy SOUL.md to the mapped host path, e.g.:
cp /opt/cross-cultural-ai-integrity-charter/infrastructure/SOUL.md \
   /docker/hermes-agent-xxxx/data/SOUL.md
```

**Option B — write it directly inside the container:**

```bash
# Inside the container
curl -o /opt/data/SOUL.md \
  https://raw.githubusercontent.com/IntegrityQuest/cross-cultural-ai-integrity-charter/main/infrastructure/SOUL.md
```

---

## Step 4 — Configure WordPress MCP

MCP servers are configured in `/opt/data/config.yaml` (inside the container).

Add a WordPress MCP server entry:

```yaml
mcp_servers:
  wordpress:
    command: "npx"
    args: ["-y", "@modelcontextprotocol/server-wordpress"]
    env:
      WORDPRESS_SITE_URL: "https://integrity.quest"
      WORDPRESS_USERNAME: "hermes"
      WORDPRESS_APP_PASSWORD: "xxxx xxxx xxxx xxxx xxxx xxxx"
    tools:
      include: [get_posts, create_post, update_post, get_pages]
```

Generate the WordPress Application Password:
**WordPress Admin → Users → Profile → Application Passwords**

---

## Step 5 — Load Charter Skills

Place Charter documents in `/opt/data/skills/iq-charter/`:

```bash
# Inside the container
mkdir -p /opt/data/skills/iq-charter

# Copy from repo (adjust path to your host volume mount)
cp /opt/cross-cultural-ai-integrity-charter/charter/*.md \
   /opt/data/skills/iq-charter/
cp /opt/cross-cultural-ai-integrity-charter/framework/*.md \
   /opt/data/skills/iq-charter/
```

Each `.md` file in the skills directory is treated as a SKILL.md module by Hermes.

---

## Step 6 — Verify

```bash
# Inside the container
hermes config show        # confirm SOUL.md loaded
hermes tools              # list available tools including MCP
/help                     # CLI command reference
```

---

## Security Notes

- Traefik handles TLS — Hermes is not directly exposed on a public port
- WordPress Application Password is scoped to Hermes only; revoke via WP Admin if needed
- SOUL.md is the ethical floor — do not replace it with untested content
- Additional LLM providers can be added later via `hermes model`

---

## Data Paths (Quick Reference)

| Item | Path inside container |
|------|-----------------------|
| SOUL.md | `/opt/data/SOUL.md` |
| Config | `/opt/data/config.yaml` |
| Skills | `/opt/data/skills/` |
| Sessions | `/opt/data/sessions/` |
| Memory | `/opt/data/memory/` |
| Auth tokens | `/opt/data/auth.json` |
