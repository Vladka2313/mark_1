<?php
	//
	return CMap::mergeArray(
		//
		require_once(__DIR__ . '/main.php'),
		//
		array(
			'components' => array(
				'urlManager' => array(
					'urlFormat' => 'path',
					'showScriptName' => false,
					'rules' => array(
						'' => array('site/index'),
						'suche/*' => array('site/search'),
                         'vorwahl/<code>'=>array('city/view'),

						'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
					),
				),
			),
		)
	);
