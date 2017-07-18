#!/bin/bash

echo ">>> Install dependencies"
sudo apt-get update -y > /dev/null
sudo apt-get install -y zip
sudo apt-get install -y unzip

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

### change project dir
cd /var/www/euro.cart/

echo ">>> current directory"
pwd

echo ">>> Install composer"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

echo ">>> Install Composer Asset Plugin"
php composer.phar global require fxp/composer-asset-plugin:~1.3

# restart services using new config
sudo service apache2 reload > /dev/null
