<?php

namespace app\modules\api\controllers;

use app\models\Product;

/**
 * Default controller for the `api` module
 */
class DefaultController extends ApiBaseController {

    public function actionIndex () {
        return [
            'data' => 'Father in the building',
            'success' => true
        ];
    }
}
