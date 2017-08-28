(function () {
    "use strict";

    angular
        .module('app')
        .controller('MainController', MainController);

    MainController.$inject = ['$http', '$log','CartService'];
    function MainController ($http, $log, CartService) {
        const vm = this;

        vm.products = [];

        active();

        ////

        function active () {
            getProducts();
        }

        function getProducts () {
            $http.get('api/product').then(function (req) {
                if (req.data.success) {
                    vm.products = req.data.data;
                } else {
                    console.log('error');
                }
            });
        }
    }
}());
