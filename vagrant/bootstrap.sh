#!/bin/bash

echo ">>> Install dependencies"
sudo apt-get update -y > /dev/null
sudo apt-get install -y zip
sudo apt-get install -y unzip


echo ">>> create db"
mysql -uroot -proot -e "CREATE DATABASE IF NOT EXISTS euro_cart
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;"

echo ">>> Configure Apache"
cat >/etc/apache2/sites-available/euro.cart.conf <<EOL
<VirtualHost *:80>
    ServerName euro.cart
    DocumentRoot "/var/www/euro.cart/"

    <Directory "/var/www/euro.cart/">
        Options Indexes FollowSymlinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog /var/www/euro.cart/error.log
    CustomLog /var/www/euro.cart/access.log combined
</VirtualHost>
EOL

# tell apache to use sites vhost file and configs
sudo a2ensite euro.cart.conf > /dev/null

sudo a2enmod rewrite

echo ">>> Install PHP dependencies"
sudo apt-get install -y php7.0-mbstring
sudo apt-get install -y php7.0-xml
sudo apt-get install -y php7.0-zip
sudo apt-get install -y php7.0-gd
sudo apt-get install -y php-xdebug

echo ">>> Configure xDebug"
cat >/etc/php/7.0/apache2/conf.d/20-xdebug.ini <<EOL
zend_extension=xdebug.so
xdebug.remote_enable=1
xdebug.remote_connect_back=1
xdebug.remote_port=9000
xdebug.remote_autostart=1
EOL

# restart services using new config
sudo service apache2 reload > /dev/null

echo ">>> Install composer"
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

echo ">>> Install Composer Asset Plugin"
composer global require fxp/composer-asset-plugin:~1.3

### change project dir
cd /var/www/euro.cart/

echo ">>> current directory"
pwd

info ">>> apply migrations"
./yii migrate --interactive=0