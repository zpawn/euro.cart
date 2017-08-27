<?php

/* @var $this yii\web\View */

$this->title = 'EuroCart - Goods from Europe';
?>

<div class="container" ng-app="app" ng-controller="MainController as vm">
    <div class="row">
        <div class="col-lg-9">
            <div class="col-lg-3 item-card" ng-repeat="product in vm.products"  ng-click = "vm.handler(product, $event)">
                <p>{{product.name}}</p>
                <img src="{{product.image}}" alt="{{ product.name }}" class="img-responsive">
                <p>{{product.price}}</p>
                <div class="wrapcard">
                    <div ng-click="vm.addRemoveCnt($event, product, 'minus')" class="cardbutton btnremove"><i class="fa fa-minus" aria-hidden="true"></i></div>
                    <div ng-click="vm.addRemoveCnt($event, product, 'plus')" class="cardbutton btnadd"><i class="fa fa-plus" aria-hidden="true"></i></div>
                    <a href="" class="tocard">В корзину</a>
                    <div class="itemcnt"><span>{{product.cnt}}</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <ul>
                <li ng-repeat="product in vm.card">{{product.name}}, {{product.price}} Cnt:{{product.cnt}}</li>
            </ul>
        </div>
    </div>
</div>

<!-- <div ng-app="app" ng-controller="MainController as vm">
    <ul>
        <li ng-repeat="product in vm.products">
            <div>{{ product.name }}: {{ product.price }}$</div>
            <div>
                <img src="{{product.image}}" alt="{{ product.name }}" style="width: 100px; height: auto;">
            </div>
        </li>
    </ul>
    <p>{{vm.products}}</p>
</div> -->
