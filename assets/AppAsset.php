<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/animate.css',
        'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',
        'css/simple-line-icons.css',

    ];
    public $js = [
        'js/wow.min.js',
        'js/waypoints.min.js',
        'js/jquery.easypiechart.js',
        'js/script.js',
        'js/jquery.parallax-1.1.3.js',
        'js/jquery.cbpQTRotator.js',
        'js/modernizr.custom.js'



    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
