# CSF Firewall Snapshot — integrity.quest VPS
**Date:** 2026-04-26  
**CSF Version:** 15.05  
**Host:** Hostinger VPS (Ubuntu)  
**Purpose:** Baseline ruleset record for the integrity.quest stack (WordPress + Docker + Hermes Agent)

---

## Inbound Rules (TCP_IN)

| Port | Protocol | Purpose |
|------|----------|---------|
| 22   | TCP      | SSH (restricted to admin IP allowlist) |
| 80   | TCP      | HTTP — redirects to HTTPS via Nginx |
| 443  | TCP      | HTTPS — WordPress + Hermes MCP endpoint |
| 2083 | TCP      | cPanel SSL (Hostinger panel access) |
| 2087 | TCP      | WHM SSL (Hostinger panel access) |

All other inbound TCP/UDP ports: **DROP** (default deny).

## Outbound Rules (TCP_OUT)

| Port | Protocol | Purpose |
|------|----------|---------|
| 80   | TCP      | HTTP outbound (package updates, apt) |
| 443  | TCP      | HTTPS outbound (Docker Hub pulls, API calls) |
| 53   | TCP/UDP  | DNS resolution |
| 123  | UDP      | NTP time sync |
| 587  | TCP      | SMTP submission (transactional mail) |

All other outbound: **DROP** (default deny).

## Docker Network Considerations

CSF requires explicit allowances for Docker bridge networks to prevent iptables conflicts:

```
# /etc/csf/csf.conf additions for Docker
DOCKER = "1"
ETH_DEVICE_SKIP = "docker0,br-*"
```

Docker's internal bridge (`docker0`, `172.17.0.0/16`) is excluded from CSF's iptables chains to allow container-to-container and container-to-host communication without CSF interference.

## Rate Limiting (cc_DENY / LF settings)

```
LF_TRIGGER = 20          # failed logins before temp block
LF_TRIGGER_PERM = 5      # repeat offenders → permanent block
CT_LIMIT = 300           # max connections per IP
PS_INTERVAL = 300        # port scan detection window (seconds)
```

## Port Scan Detection

`PS_PORTS = "0:65535"` — full port range monitored.  
Triggers on 3+ hits within `PS_INTERVAL`: source IP blocked for `PS_DURATION = 3600` seconds.

## Allowed IP Allowlist (`/etc/csf/csf.allow`)

- Admin home IP (static) — SSH access
- Hostinger monitoring IPs (documented in Hostinger panel)
- CloudFlare IP ranges (if CF proxy enabled for the domain)

## Notes

- `TESTING = "0"` — CSF is in live (non-test) mode
- `IPV6 = "1"` — IPv6 rules mirrored from IPv4 ruleset
- Fail2Ban is **not** installed; CSF's Login Failure Daemon (LFD) handles brute-force detection
- Weekly `csf --update` scheduled via cron to track upstream CSF releases
