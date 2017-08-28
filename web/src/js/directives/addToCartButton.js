(function () {
    "use strict";

    angular
        .module('app')
        .directive('addToCartButton', AddToCartButton);

    function AddToCartButton () {
        return {
            restrict: 'E',
            scope: {
                productInfo: '='
            },
            template:  '<div class="wrapcard">' +
                '<div ng-click="remove()" class="cardbutton btnremove"><i class="fa fa-minus" ng-show="true" ng-class="{active: true}"></i></div>' +
                '<div ng-click="add()" class="cardbutton btnadd"><i class="fa fa-plus" aria-hidden="true"></i></div>' +
                '<a href="" class="tocard" ng-class="{oncard: count>0}" >В корзину</a>' +
                '<div class="itemcnt"><span>{{product.cnt}}</span></div>' +
            '</div>',
            controller: ['$scope', 'CartService', function ($scope, CartService) {
                const vm = $scope;
                vm.count = 0;

                vm.add = function () {
                    // CartService.add();
                };

                vm.remove = function () {
                    // CartService.remove()
                };
            }]
        };
    }
}());
