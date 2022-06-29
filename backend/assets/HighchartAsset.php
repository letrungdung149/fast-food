<?php
/**
 * Created by Navatech.
 * @project fast-food
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    8/2/2021
 * @time    9:31 AM
 */
namespace backend\assets;

use yii\web\AssetBundle;

class HighchartAsset extends AssetBundle {
	public $sourcePath = '@bower/highcharts';
	public $css  =[];
	public $js = [
		'highcharts.js',
		'highcharts-more.js',
	];
	public $depends = [
	 'yii\web\JqueryAsset',
	];
}


