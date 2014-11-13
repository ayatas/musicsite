<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'components'=>array(
            // uncomment the following to enable URLs in path - format
            'urlManager'=>array(
                'urlFormat'=>'path',
                'showScriptName'=>false,
				'caseSensitive'=>false,
                'rules'    =>array(
                	'' => 'site/index',
                	'<controller>' => '<controller>/index',
                    '<controller:\w+>/<id:\d+>'             =>'<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                    '<controller:\w+>/<action:\w+>'         =>'<controller>/<action>',
                ),
            ),
        ),
    )
);
