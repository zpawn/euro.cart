EuroCart
============================

[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)
[![AngularJS](https://img.shields.io/badge/Powered_by-AngularJS-red.svg?style=flat)](https://angularjs.org/)

EuroCart - mini e-commerce

### Run Project

1. Clone repository
2. Go to directory ./vagrant
3. Run vagrant `vagrant up`
4. Connect to Virtual Machine `vagrant ssh`
5. Go to project directory `cd /var/www/euro.cart`
6. (first run) install dependencies
    * `php composer.phar global require fxp/composer-asset-plugin:~1.3`
    * `php composer.phar install`

### Example rest response

#### Success
```javascript
{
    success: true,
    data: [
        {
            id: 1,
            name: 'productName',
            description: 'productDescription',
            price: 8.3
        },
        // ...
    ]
}
```
#### Error
```javascript
{
    success: false,
    message: 'Error message'
}
```
