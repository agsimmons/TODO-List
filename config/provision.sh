#!/usr/bin/env bash

# Update and upgrade packages
apt-get update
apt-get upgrade -y

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

# Create database
mysql -e "DROP DATABASE IF EXISTS todo;"
mysql -e "CREATE DATABASE todo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Create user
mysql -e "CREATE USER 'todouser' IDENTIFIED BY 'todouserpassword';"
mysql -e "GRANT USAGE ON *.* TO 'todouser'@localhost IDENTIFIED BY 'todouserpassword';"
mysql -e "GRANT ALL PRIVILEGES ON `todo`.* TO 'todouser'@localhost;"
mysql -e "FLUSH PRIVILEGES;"

# Load database schema
mysql todo < /vagrant/config/schema.sql
# =======================

# === PHP ===
apt-get install -y php php-mysql
# ===========
