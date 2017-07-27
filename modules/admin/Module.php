<?php

namespace app\modules\admin;

use Yii;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module {
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init () {
        parent::init();

        // custom initialization code goes here
        Yii::$app->errorHandler->errorAction = 'admin/default/error';
    }
}
