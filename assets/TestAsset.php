<?php

namespace app\assets;

use yii\web\AssetBundle;

class TestAsset extends AssetBundle
{

    //public $sourcePath = '@app/components';
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $cssOptions = ['condition' => 'lte IE9'];

    public $css = [
        'css/styles.css',
    ];

    public $js = [
//        'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',
        'js/scripts.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];


}