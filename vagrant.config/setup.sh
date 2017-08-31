#!/bin/bash

sudo yum update -y

# NTP
sudo yum install -y ntp
sudo cp -a /vagrant/vagrant.config/ntp.conf /etc/ntp.conf
sudo service ntpd start
sudo chkconfig ntpd on

# timezone
cp -p /usr/share/zoneinfo/Japan /etc/localtime

# iptables
sudo iptables -F
sudo service iptables stop
sudo chkconfig iptables off

# mysql5.6
sudo yum install -y http://dev.mysql.com/get/mysql-community-release-el6-5.noarch.rpm
sudo yum install -y mysql mysql-server
sudo service mysqld start
sudo chkconfig mysqld on
sudo mysql_secure_installation
sudo cp -f /vagrant/vagrant.config/my.cnf /etc/my.cnf

# DB for WP
mysql -uroot <<EOF
CREATE USER wp_user@localhost IDENTIFIED BY 'wp_passwd';
CREATE DATABASE wp_db;
GRANT ALL PRIVILEGES ON wp_db.* TO wp_user@localhost;
EOF

# php5.6
sudo rpm -Uvh http://ftp.iij.ad.jp/pub/linux/fedora/epel/6/x86_64/epel-release-6-8.noarch.rpm
sudo rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
sudo yum -y install --enablerepo=remi --enablerepo=remi-php56 php-mysql php php-gd php-mbstring php-fpm php-xml phpMyAdmin
sudo mv /etc/php-fpm.d/www.conf /etc/php-fpm.d/www.conf.original
sudo cp -a /vagrant/vagrant.config/www.conf /etc/php-fpm.d/www.conf
sudo mv /etc/php.ini /etc/php.ini.original
sudo cp -a /vagrant/vagrant.config/php.ini /etc/php.ini
sudo chown -R nginx:nginx /var/lib/php/session
sudo service php-fpm start
sudo chkconfig php-fpm on

# nginx
sudo rpm -ivh http://nginx.org/packages/centos/6/noarch/RPMS/nginx-release-centos-6-0.el6.ngx.noarch.rpm
sudo yum install -y nginx
sudo cp /vagrant/vagrant.config/nginx/mobile-detect /etc/nginx/
sudo mv /etc/nginx/nginx.conf /etc/nginx/nginx.conf.original
sudo cp /vagrant/vagrant.config/nginx/nginx.conf /etc/nginx/
sudo mv /etc/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf.original
sudo cp /vagrant/vagrant.config/nginx/laravel-wp-test.conf /etc/nginx/conf.d/
sudo mkdir /var/log/nginx/log
sudo chown nginx /var/log/nginx/log
sudo chmod 750 /var/log/nginx/log/

# ssl
sudo cp /vagrant/vagrant.config/ssl/server.* /etc/nginx/conf.d/

# restart
sudo service nginx start
sudo chkconfig nginx on
sudo service php-fpm start
