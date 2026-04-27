# VPS Firewall Configuration

**Firewall Manager:** UFW 0.36.2 (Ubuntu built-in)
**Last Updated:** April 27, 2026
**Server:** srv1596058 (Hostinger VPS, Ubuntu)

> Note: Original snapshot was CSF v15.05 from the old DirectAdmin VPS. New VPS uses UFW.
> CSF download server (download.configserver.com) was unreachable during setup, so UFW was used instead.

---

## Current Status

```
Status: active
Default: deny (incoming), deny (outgoing), deny (routed)
```

---

## Rules Summary

### Inbound (ALLOW IN)
| Port | Protocol | Purpose |
|------|----------|---------|
| any | all | Loopback (lo) |
| 20, 21 | TCP/UDP | FTP |
| 22 | TCP | SSH |
| 53 | TCP/UDP | DNS |
| 80 | TCP/UDP | HTTP |
| 443 | TCP/UDP | HTTPS |
| 853 | TCP/UDP | DNS over TLS |
| 2222 | TCP | Alternate SSH |
| 35000–35999 | TCP | Passive FTP range |

### Outbound (ALLOW OUT)
| Port | Protocol | Purpose |
|------|----------|---------|
| any | all | Loopback (lo) |
| 20, 21 | TCP/UDP | FTP |
| 22 | TCP | SSH |
| 25 | TCP | SMTP |
| 53 | TCP/UDP | DNS |
| 80 | TCP | HTTP |
| 110 | TCP | POP3 |
| 113 | TCP/UDP | Ident |
| 123 | UDP | NTP |
| 143 | TCP | IMAP |
| 443 | TCP/UDP | HTTPS |
| 465 | TCP | SMTPS |
| 587 | TCP | SMTP submission |
| 853 | TCP/UDP | DNS over TLS |
| 993 | TCP | IMAPS |
| 995 | TCP | POP3S |
| 2222 | TCP | Alternate SSH |
| 11335 | UDP | ClamAV/SpamAssassin |

All rules apply to both IPv4 and IPv6.

---

## DNS Configuration

`/etc/resolv.conf` set to static file (systemd-resolved stub was non-functional):

```
nameserver 8.8.8.8
nameserver 8.8.4.4
nameserver 1.1.1.1
```

---

## Restore Commands

If UFW is reset or disabled, restore with:

```bash
ufw default deny incoming
ufw default deny outgoing

ufw allow in on lo
ufw allow out on lo
ufw allow in 22/tcp
ufw allow in 2222/tcp
ufw allow out 22/tcp
ufw allow out 2222/tcp

ufw allow in 80/tcp
ufw allow in 80/udp
ufw allow in 443/tcp
ufw allow in 443/udp
ufw allow out 80/tcp
ufw allow out 443/tcp
ufw allow out 443/udp

ufw allow in 53/tcp
ufw allow in 53/udp
ufw allow out 53/tcp
ufw allow out 53/udp
ufw allow in 853/tcp
ufw allow in 853/udp
ufw allow out 853/tcp
ufw allow out 853/udp

ufw allow in 20/tcp
ufw allow in 20/udp
ufw allow in 21/tcp
ufw allow in 21/udp
ufw allow in 35000:35999/tcp
ufw allow out 20/tcp
ufw allow out 20/udp
ufw allow out 21/tcp
ufw allow out 21/udp

ufw allow out 25/tcp
ufw allow out 110/tcp
ufw allow out 143/tcp
ufw allow out 465/tcp
ufw allow out 587/tcp
ufw allow out 993/tcp
ufw allow out 995/tcp
ufw allow out 123/udp
ufw allow out 113/tcp
ufw allow out 113/udp
ufw allow out 11335/udp

ufw enable
```

---

## Ports Hermes/MCP Will Need

When Hermes MCP port is confirmed, add:
```bash
ufw allow in <MCP_PORT>/tcp
```

Traefik uses 80/443 — already open.
