#!/bin/bash
# Firewall setup for DirectAdmin + MagicAI Docker (Laravel) VPS
# Run as root after OS reinstall

set -e

echo "==> Installing UFW..."
apt-get update -qq
apt-get install -y ufw fail2ban

echo "==> Resetting UFW to clean state..."
ufw --force reset

echo "==> Setting default policies..."
ufw default deny incoming
ufw default allow outgoing
ufw default deny forward

echo "==> SSH (rate-limited to block brute force)..."
ufw limit 22/tcp comment 'SSH'

echo "==> Web traffic..."
ufw allow 80/tcp  comment 'HTTP'
ufw allow 443/tcp comment 'HTTPS'

echo "==> DirectAdmin control panel..."
ufw allow 2222/tcp comment 'DirectAdmin panel'

echo "==> FTP (DirectAdmin file management)..."
ufw allow 20/tcp comment 'FTP data'
ufw allow 21/tcp comment 'FTP control'
ufw allow 49152:65534/tcp comment 'FTP passive range'

echo "==> DNS (if this VPS serves DNS for your domains)..."
ufw allow 53/tcp comment 'DNS TCP'
ufw allow 53/udp comment 'DNS UDP'

# Docker manages its own iptables rules for container networking.
# Do NOT open 3306 (MySQL) or 6379 (Redis) — containers reach them internally.

echo "==> Enabling UFW..."
ufw --force enable

echo ""
echo "==> UFW status:"
ufw status verbose

echo ""
echo "==> Configuring fail2ban for SSH protection..."
cat > /etc/fail2ban/jail.local << 'EOF'
[DEFAULT]
bantime  = 1h
findtime = 10m
maxretry = 5

[sshd]
enabled = true
port    = ssh
logpath = %(sshd_log)s
backend = %(sshd_backend)s

[directadmin]
enabled  = true
port     = 2222
logpath  = /var/log/directadmin/login.log
maxretry = 5
EOF

systemctl enable fail2ban
systemctl restart fail2ban

echo ""
echo "==> Done. Firewall is active and fail2ban is running."
echo "    Verify with: ufw status verbose && fail2ban-client status"
