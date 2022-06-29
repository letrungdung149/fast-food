<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
	    'font-awesome/4.5.0/css/font-awesome.min.css',
	    'css/fonts.googleapis.com.css',
	    'css/ace.min.css',
	    'css/ace-skins.min.css',
	    'css/ace-rtl.min.css',
    ];
    public $js = [
	    'js/ace-extra.min.js',
	    'js/jquery-ui.custom.min.js',
	    'js/jquery.ui.touch-punch.min.js',
	    'js/jquery.easypiechart.min.js',
	    'js/jquery.sparkline.index.min.js',
	    //		'js/jquery.flot.min.js',
	    //		'js/jquery.flot.pie.min.js',
	    //		'js/jquery.flot.resize.min.js',
	    'js/ace-elements.min.js',
	    'js/ace.min.js',
	    //		'js/main-custom.js',
    ];
	public $jsOptions=[
		'position'=>View::POS_HEAD
	];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
	    'yii\bootstrap\BootstrapPluginAsset',
    ];
}
