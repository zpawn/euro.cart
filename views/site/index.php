<?php

/* @var $this yii\web\View */

$this->title = 'EuroCart - Goods from Europe';
?>

<div ng-app="app" ng-controller="MainController as vm">
    <ul>
        <li ng-repeat="product in vm.products">
            <div>{{ product.name }}: {{ product.price }}$</div>
            <div>
                <img src="{{product.image}}" alt="{{ product.name }}" style="width: 100px; height: auto;">
            </div>
        </li>
    </ul>
</div>
