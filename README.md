EuroCart
============================

[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)
[![AngularJS](https://img.shields.io/badge/Powered_by-AngularJS-red.svg?style=flat)](https://angularjs.org/)

EuroCart - mini e-commerce

## Run Project

1. Clone repository
2. Go to directory ./vagrant
3. Run vagrant `vagrant up`
4. Add to `hosts` > `192.168.100.105    euro.cart`
5. Go to url [http://euro.cart/](http://euro.cart/)

## Created api
* `/api` - default route
* `/api/product` - get list of products

## Example rest response

Success:
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
Error:
```javascript
{
    success: false,
    message: 'Error message'
}
```

## Author

* **[Ilya Batarin](https://github.com/batar-btr)** - *Frontend Dev*
* **[Ilia Makarov](https://github.com/zpawn)** - *Backend Dev*

## License

EuroCart is licensed under the [MIT license](http://opensource.org/licenses/MIT)
