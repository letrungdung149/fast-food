<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'cart' => [
	        'class' => 'yii2mod\cart\Cart',
	        // you can change default storage class as following:
	        'storageClass' => [
		        'class' => 'yii2mod\cart\storage\DatabaseStorage',
		        // you can also override some properties
		        'deleteIfEmpty' => true
	        ]
        ],
    ],
    'modules' => [
	    'user' => [
		    'class' => 'dektrium\user\Module',
		    'enableUnconfirmedLogin'=>true,
		    'enableGeneratingPassword'=>false,
		    'enablePasswordRecovery'=>true,
		    'enableConfirmation' => false,
		    'confirmWithin' => 21600,
		    'cost' => 12,
	    ],
    ],
];
