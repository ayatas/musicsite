<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path / to / local - folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'My MusicHut',

	// preloading 'log' component
	'preload' => array('log'),

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.extensions.EAjaxUpload.*',
	),

	'modules' => array(
		// uncomment the following to enable the Gii tool

		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'bandcamp',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array(
				'127.0.0.1',
				'::1',
			),
		), ),

	'behaviors' => array('runEnd' => array('class' => 'application.components.WebApplicationEndBehavior')),

	// application components
	'components' => array(
	
	// application components
		'Paypal' => array(
		'class'=>'application.components.Paypal',
		'apiUsername' => 'brahmaji-facilitator_api1.ayatas.com',
		'apiPassword' => '1394451429',
		'apiSignature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AkYxqPdBN0RFybR06NX-rNRYvI7o',
		'apiLive' => false,	 
		'returnUrl' => 'payment/confirm/', //regardless of url management component
		'cancelUrl' => 'payment/cancel/', //regardless of url management component
	 
		// Default currency to use, if not set USD is the default
		'currency' => 'USD',
	 
		// Default description to use, defaults to an empty string
		//'defaultDescription' => '',
	 
		// Default Quantity to use, defaults to 1
		//'defaultQuantity' => '1',
	 
		//The version of the paypal api to use, defaults to '3.0' (review PayPal documentation to include a valid API version)
		//'version' => '3.0',
	),
	
	'region'=>array('class'=>'RegionSingleton'),
		'user' => array(
			// enable cookie - based authentication
			'allowAutoLogin' => true, ),

		// uncomment the following to use a MySQL database

		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=musicsite',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_'
		),

		'errorHandler' => array(
			// use 'site / error' action to display errors
			'errorAction' => 'site/error', ),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array( array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				 array(
				 'class'=>'CWebLogRoute',
				 ),
				 */
			),
		),
	),

	// application - level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => 'webmaster@example.com', ),
);
