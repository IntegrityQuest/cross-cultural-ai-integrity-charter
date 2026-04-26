# SOUL.md — Hermes Deployment Notes
**Date:** 2026-04-26  
**Source file:** `infrastructure/SOUL.md` (this repo)  
**Deploy target:** `~/.hermes/SOUL.md` on the Hostinger VPS

---

## What SOUL.md Does

SOUL.md is the Layer 1 ethical floor loaded by Hermes at container startup. It sits beneath:
- Layer 2 — WordPress/Integrity.Quest deployment context
- Layer 3 — any per-user or per-session personality customization

It defines what Hermes **owes** (not what it is). It cannot override architecture (Layer 0).

## Deploying to the VPS

```bash
# Copy from repo to Hermes config directory
cp /opt/cross-cultural-ai-integrity-charter/infrastructure/SOUL.md ~/.hermes/SOUL.md
```

The Docker Compose volume mount (defined in `hermes-docker-install-plan.md`) picks it up read-only:

```yaml
volumes:
  - ~/.hermes/SOUL.md:/config/SOUL.md:ro
```

Hermes reads it via the `HERMES_SOUL_PATH=/config/SOUL.md` environment variable.

## Keeping It in Sync

SOUL.md is versioned in this repository. When the Charter is updated, pull the repo and re-copy:

```bash
cd /opt/cross-cultural-ai-integrity-charter
git pull origin main
cp infrastructure/SOUL.md ~/.hermes/SOUL.md
docker restart hermes
```

The nightly skills sync script (`sync-hermes-skills.sh`) does **not** copy SOUL.md automatically — SOUL.md updates should be deliberate, not automatic, since they change the agent's ethical baseline.

## Verification

After deployment, confirm Hermes loaded it:

```bash
curl -s http://127.0.0.1:8080/health | jq .soul_loaded
# expected: true
```

## Authorship and License

- Source: Cross-Cultural AI Integrity Charter
- License: CC BY 4.0 — integrity.quest
- 3-Fold Consensus: Claude ✓ — Fisher ✓ — ChatGPT ✓
- Ratified: February 16, 2026
