#!/bin/bash

# Making configuration changes to the enviroment after installation of components

usermod -a -G vagrant apache

# SELinux - relax restrictions to make it possible to serve files from other directory
setenforce 0

# Web app
ln -s /vagrant/provisioning/pizzatest.vhost.conf /etc/httpd/conf.d
rm /etc/httpd/conf.d/welcome.conf

mkdir /var/lib/php/session
chmod -R 777 /var/lib/php/session

su - vagrant -c "cd /vagrant && composer install && composer development-enable"

# Autostart services
systemctl start httpd
systemctl start php-fpm
systemctl start mariadb
systemctl enable httpd
systemctl enable php-fpm
systemctl enable mariadb

# Create db
cat /vagrant/data/pizzatest.dbschema.sql | mysql -uroot
