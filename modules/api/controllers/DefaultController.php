<?php

namespace app\modules\api\controllers;

use app\models\Product;

/**
 * Default controller for the `api` module
 */
class DefaultController extends ApiBaseController {

    public function actionIndex () {
        $response = [];

        $model = Product::find()->with('category')->all();

        foreach($model as $product) {
            $response['data'][] = [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'category' => isset($product->category->name) ? $product->category->name : null,
                'image' => $product->getImage()->getPathToOrigin()
            ];
        }

        return $response;
    }
}
