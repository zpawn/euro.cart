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

echo ">>> Install PHP dependencies"
sudo apt-get install -y php7.0-mbstring
sudo apt-get install -y php7.0-xml
sudo apt-get install -y php7.0-zip
sudo apt-get install -y php7.0-gd

echo ">>> Install composer"
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

echo ">>> Install Composer Asset Plugin"
composer global require fxp/composer-asset-plugin:~1.3

### change project dir
cd /var/www/euro.cart/

echo ">>> current directory"
pwd

# restart services using new config
sudo service apache2 reload > /dev/null
