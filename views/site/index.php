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
                <add-to-cart-button product-info="product"></add-to-cart-button>
            </div>
        </div>
        <div class="col-lg-3">

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
