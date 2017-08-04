<?php

namespace app\modules\api;

use Yii;
use yii\web\CompositeUrlRule;

class UrlRules extends CompositeUrlRule {

    public function createRules () {

        return [
            Yii::createObject(['class' => 'yii\web\UrlRule', 'verb' => 'GET',   'pattern' => 'api/<controller>/<id:\d+>',   'route' => 'api/<controller>/view']),
            Yii::createObject(['class' => 'yii\web\UrlRule', 'verb' => 'GET',   'pattern' => 'api/<controller>',            'route' => 'api/<controller>/index']),
            Yii::createObject(['class' => 'yii\web\UrlRule', 'verb' => 'POST',  'pattern' => 'api/<controller>/<id:\d+>',   'route' => 'api/<controller>/update']),
            Yii::createObject(['class' => 'yii\web\UrlRule', 'verb' => 'PUT',   'pattern' => 'api/<controller>/<id:\d+>',   'route' => 'api/<controller>/update']),
            Yii::createObject(['class' => 'yii\web\UrlRule', 'verb' => 'POST',  'pattern' => 'api/<controller>',            'route' => 'api/<controller>/create']),
        ];
    }
}
