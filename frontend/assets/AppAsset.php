<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
	    'common/css/site.css',
	    'common/fonts/font-awesome-4.7.0/css/font-awesome.min.css',
	    'common/css/style.css',
	    'common/css/slider.css',
	    'common/css/form.css',
	    'common/css/grid.css',
	    'common/css/ie.css',
	    'common/css/prettyPhoto.css',
	    'common/css/reset.css',
	    'common/css/superfish.css',
	    'fonts/font/flaticon.css',
	    'css/style.css',
	    'css/bootsrap.css',

    ];
    public $js = [
        'common/js/jquery.js',
	    'common/js/jquery-migrate-1.1.1.js',
	    'common/js/superfish.js',
	    'common/js/jquery.easing.1.3.js',
	    'common/js/sForm.js',
	    'common/js/jquery.carouFredSel-6.1.0-packed.js',
	    'common/js/tms-0.4.1.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
