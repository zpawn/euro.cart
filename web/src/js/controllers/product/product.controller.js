(function () {
    "use strict";

    angular
        .module('app')
        .controller('MainController', MainController);

    MainController.$inject = ['$http', '$log','CartService', 'pagination'];
    function MainController ($http, $log, CartService, pagination) {
        const vm = this;

        vm.products = [];
        vm.card = CartService.serviceCard;
        vm.getCurrentProduct = false;
        vm.preloader = false;
        vm.currentPage = 0;
        vm.itemsPerPage = 4;
        vm.filterItem = 'price';
        
        vm.check = function (currentProduct) {
            var result = false;
            vm.card.forEach(function (element) {
                if (currentProduct.id === element.id) {
                    result = true;
                }
            });
            return result;
            
        };
       
        
        

        vm.handler = CartService.handler;
        vm.addRemoveCnt = CartService.addRemoveCnt;
        
        
        

        active();

        

        ////

        function active () {
            getProducts();
        }
        
        

        function getProducts () {
            $http.get('api/product').then(function (req) {
                if (req.data.success) {
                    vm.products = req.data.data;
                    vm.limitValue = Math.ceil(vm.products.length/vm.itemsPerPage);
                } else {
                    console.log('error');
                }
            }).then(function(){
                vm.preloader = true;
            });
        }
    }
}());
