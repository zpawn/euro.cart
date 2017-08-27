(function () {
    "use strict";

    angular
        .module('app')
        .controller('MainController', MainController);

    MainController.$inject = ['$http', '$log','CartService'];
    function MainController ($http, $log, CartService) {
        const vm = this;

        vm.products = [];
        vm.card = [];

        function delFromCard (product) {
            vm.card.splice(vm.card.indexOf(product), 1);
        }

        function checkCard(currentProduct) {
            var result = true;
            vm.card.forEach(function (element) {
                if (currentProduct.id === element.id) {
                    result = false;
                }
            });
            return result;
        }
        function showHideCntButtons (event) {
            var parent = event.target.closest('.wrapcard');
            if (parent.querySelector('.tocard').classList.contains('oncard')) {
                parent.querySelector('.btnremove').style.display = 'block';
                parent.querySelector('.btnadd').style.display = 'block';
                parent.querySelector('.itemcnt').style.display = 'block';
            } else {
                parent.querySelector('.btnremove').style.display = 'none';
                parent.querySelector('.btnadd').style.display = 'none';
                parent.querySelector('.itemcnt').style.display = 'none';
            }
            // var jq = angular.element(event.target);
            // console.log(jq);

        }

        vm.handler = function (e,b) {

            if (b.target.classList.contains('tocard')) {
                b.target.classList.toggle('oncard');
            
                if(checkCard(e)) {
                    e.cnt = 1;
                    vm.card.push(e);
                } else {
                    e.cnt = 0;
                    delFromCard(e);
                }
                showHideCntButtons(b);
            }
            CartService.www();
        //    console.log(vm.card);
        };

        vm.addRemoveCnt = function (event, product, type) {
            if (type === 'minus') {
                product.cnt -= 1;
            } else {
                product.cnt += 1;
            }
            if (product.cnt === 0) {
                delFromCard(product);
                event.currentTarget.parentNode.querySelector('.tocard').classList.toggle('oncard');
                showHideCntButtons(event);
            }
            console.log(event.currentTarget.parentNode)
        };

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
            }).then(function(){
                console.dir(vm.products);
            });
        }
    }
}());
