<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/modal.css',
        //'css/grid.css',
        'css/mainPage.css',
        'css/contentMap.css',
    ];
    public $js = [
        'js/modalShow.js',
        'js/Mapas.js',
        'https://js.pusher.com/3.2/pusher.min.js',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyDMVbdR-TGis783bW9rB9tZUJXVXsIRzkQ&libraries=places,geometry',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'raoul2000\bootswatch\BootswatchAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
