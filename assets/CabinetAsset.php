<?php
/**
 * Created by PhpStorm.
 * User: User11
 * Date: 29.11.2016
 * Time: 15:08
 */

namespace app\assets;


use yii\web\AssetBundle;

class CabinetAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/styles.css'
    ];
    public $js = [



    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];


}