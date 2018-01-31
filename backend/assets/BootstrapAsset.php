<?php

namespace backend\assets;

use yii\web\AssetBundle;

class BootstrapAsset extends AssetBundle {
    public $sourcePath = __DIR__ . '/bootstrap';
    public $css = [
        'css/bootstrap.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
