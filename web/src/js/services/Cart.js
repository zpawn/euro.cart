(function () {
    'use strict';

    angular
        .module('app')
        .service('CartService', CartService);

    CartService.$inject = ['$log'];
    function CartService($log) {}

    CartService.prototype.add = function () {
        $log.debug('addToCartService');
    };

    CartService.prototype.remove = function () {
        $log.debug('removeFromCartService');
    };
}());
