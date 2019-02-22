#!/usr/bin/env bash

# Update packages
apt-get update

# === Apache ===
# Install Apache
apt-get install -y apache2

# Set up synced HTML folder
if ! [ -L /var/www/html ]; then
	rm -rf /var/www/html
	ln -fs /vagrant/html /var/www/html
fi
# ==============

# === MariaDB / MySQL ===
apt-get install -y mariadb-server mariadb-client

# TODO: Configure MariaDB
# =======================

# === PHP ===
apt-get install -y php php-mysql
# ===========
