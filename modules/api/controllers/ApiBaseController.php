<?php
/**
 * Created by PhpStorm.
 * User: zpawn
 * Date: 04.08.17
 * Time: 23:04
 */

namespace app\modules\api\controllers;

use yii\rest\Controller;
use yii\web\Response;

class ApiBaseController extends Controller {

    public function behaviors () {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator']['formats'] = [
            'application/json' => Response::FORMAT_JSON,
        ];

        return $behaviors;
    }
}