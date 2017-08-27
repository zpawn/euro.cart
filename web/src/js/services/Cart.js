(function () {
    'use strict';

    angular
        .module('app')
        .service('CartService', CartService);

    CartService.$inject = ['$http'];

    function CartService($http) {
        this.www = function () {
            console.log('fffffffffffffff');
        };
    }
}());