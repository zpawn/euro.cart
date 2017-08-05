<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class EuroCartAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'dist/eurocart.css'
    ];
    public $js = [
        'dist/eurocart.js'
    ];
    public $depends = [];
}
