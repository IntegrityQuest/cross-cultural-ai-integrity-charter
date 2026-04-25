#!/bin/bash
# Post-install script for Hostinger VPS
# Paste this into hPanel -> VPS -> Manage -> Post-Install Script
# OR run as root immediately after OS reinstall via SSH
#
# Stack: Ubuntu 22.04 LTS + DirectAdmin + MagicAI Docker (Laravel)

set -e

LOG="/var/log/post-install.log"
exec > >(tee -a "$LOG") 2>&1
echo "==> Post-install started: $(date)"

# ── 1. System update ─────────────────────────────────────────────────────────
echo "==> Updating system packages..."
apt-get update -qq
apt-get upgrade -y
apt-get install -y curl wget git unzip ufw fail2ban software-properties-common \
    apt-transport-https ca-certificates gnupg lsb-release

# ── 2. Set timezone ───────────────────────────────────────────────────────────
echo "==> Setting timezone to UTC..."
timedatectl set-timezone UTC

# ── 3. Firewall (UFW) ─────────────────────────────────────────────────────────
echo "==> Configuring firewall..."
ufw --force reset
ufw default deny incoming
ufw default allow outgoing
ufw default deny forward

ufw limit 22/tcp    comment 'SSH'
ufw allow 80/tcp    comment 'HTTP'
ufw allow 443/tcp   comment 'HTTPS'
ufw allow 2222/tcp  comment 'DirectAdmin'
ufw allow 20/tcp    comment 'FTP data'
ufw allow 21/tcp    comment 'FTP control'
ufw allow 49152:65534/tcp comment 'FTP passive'
ufw allow 53/tcp    comment 'DNS TCP'
ufw allow 53/udp    comment 'DNS UDP'
ufw --force enable

# ── 4. fail2ban ───────────────────────────────────────────────────────────────
echo "==> Configuring fail2ban..."
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
EOF
systemctl enable fail2ban
systemctl restart fail2ban

# ── 5. Docker ─────────────────────────────────────────────────────────────────
echo "==> Installing Docker..."
install -m 0755 -d /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg \
    | gpg --dearmor -o /etc/apt/keyrings/docker.gpg
chmod a+r /etc/apt/keyrings/docker.gpg

echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] \
https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" \
    > /etc/apt/sources.list.d/docker.list

apt-get update -qq
apt-get install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin

systemctl enable docker
systemctl start docker

echo "==> Docker version: $(docker --version)"

# ── 6. Swap (recommended for small VPS plans) ─────────────────────────────────
if [ ! -f /swapfile ]; then
    echo "==> Creating 2GB swap file..."
    fallocate -l 2G /swapfile
    chmod 600 /swapfile
    mkswap /swapfile
    swapon /swapfile
    echo '/swapfile none swap sw 0 0' >> /etc/fstab
    sysctl vm.swappiness=10
    echo 'vm.swappiness=10' >> /etc/sysctl.conf
fi

# ── 7. Basic SSH hardening ────────────────────────────────────────────────────
echo "==> Hardening SSH..."
sed -i 's/#PermitRootLogin yes/PermitRootLogin prohibit-password/' /etc/ssh/sshd_config
sed -i 's/PermitRootLogin yes/PermitRootLogin prohibit-password/' /etc/ssh/sshd_config
sed -i 's/#PasswordAuthentication yes/PasswordAuthentication yes/' /etc/ssh/sshd_config
systemctl restart sshd

# ── 8. Summary ────────────────────────────────────────────────────────────────
echo ""
echo "==> Post-install complete: $(date)"
echo ""
echo "    Next steps:"
echo "    1. Install DirectAdmin: https://www.directadmin.com/install.php"
echo "    2. Deploy MagicAI via Docker (see vps/magicai-docker.sh)"
echo "    3. Verify firewall: ufw status verbose"
echo "    4. Check fail2ban: fail2ban-client status"
echo ""
