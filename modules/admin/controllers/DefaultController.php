<?php

namespace app\modules\admin\controllers;


use Yii;
use app\models\LoginForm;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppAdminController {

    public function actions () {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex () {
        return $this->render('index');
    }

    public function actionLogin () {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout () {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
