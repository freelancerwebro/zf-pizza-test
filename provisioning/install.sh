#!/bin/bash

# Installing all components

# wget
yum install -y wget

# Apache
yum install -y httpd-2.4.6

# Add webtatic repos (for php7)
rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

# PHP
yum install -y php71w-fpm
yum install -y php71w-opcache
yum install -y php71w-cli
yum install -y php71w-pdo
yum install -y php71w-mysql
yum install -y php71w-mbstring
yum install -y php71w-intl

# MySQL server/client
yum install -y mariadb-server

# Composer
source /vagrant/provisioning/composer.sh

# Configuration
source /vagrant/provisioning/configuration.sh
