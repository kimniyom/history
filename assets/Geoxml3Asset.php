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
class Geoxml3Asset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'web/lib/geoxml3/geoxml3.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//'yii\bootstrap\BootstrapAsset',
    ];

    //<script src="http://maps.google.com/maps/api/js?v=3&amp;sensor=true"></script>
}
