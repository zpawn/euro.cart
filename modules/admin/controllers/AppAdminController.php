<?php
/**
 * Created by PhpStorm.
 * User: zpawn
 * Date: 23.07.17
 * Time: 15:07
 */

namespace app\modules\admin\controllers;


use yii\web\Controller;
use yii\filters\AccessControl;

class AppAdminController extends Controller {

    public function behaviors () {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }
}
