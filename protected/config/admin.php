<?php

return CMap::mergeArray(
require (dirname(__FILE__) . '/main.php'), array(
	'theme' => 'abound',
	// application components
	'components' => array(
		// uncomment the following to enable URLs in path - format
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'caseSensitive' => false,
			'rules' => array(
				'admin' => 'site/index',
				'admin/<action>' => 'site/<action>',
				'admin/<controller:\w+>/<id:\d+>' => '<controller>/view',
				'admin/<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
			),
		), ),
));
