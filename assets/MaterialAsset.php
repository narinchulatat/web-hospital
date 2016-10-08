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
class MaterialAsset extends AssetBundle {
    public $sourcePath = '@themes/material';
    public $baseUrl = '@web';
    public $css = [
        'css/makerstrap.complete.min.css',
        'css/makerstrap.min.css',
        'css/site.css',
        'css/fonts.css',
//        'css/bootstrap.min.css'
    ];
    public $js = [
      //  'js/main.js',
      //  'js/material.js',
      //  'js/ripples.js',
      // 'js/material.min.js',
      // 'js/ripples.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
