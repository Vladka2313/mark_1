<?php
	//
	return CMap::mergeArray(
		//
		require_once(__DIR__ . '/local.php'),
		//
		array(
			'basePath' => realpath(__DIR__ . '/..'),
			'name' => 'Vorwahl',
			'language' => 'ru',
			'aliases' => array(
		        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'),
		    ),
			'import' => array(
				'application.models.*',
				'application.components.*',
				'bootstrap.components.*',
		        'bootstrap.behaviors.*',
		        'bootstrap.widgets.*',
		        'bootstrap.helpers.*',
			),
			'modules' => array(
				'gii' => array(
					'class' => 'system.gii.GiiModule',
					'password' => 'gii',
					'ipFilters' => array('127.0.0.1','::1'),
					'generatorPaths' => array('bootstrap.gii'),
				),
				'webshell' => array(
		            'class' => 'application.modules.webshell.WebShellModule',
		            // when typing 'exit', user will be redirected to this URL
					'ipFilters' => array('*','::1'),
		            'exitUrl' => '/',
		            // custom wterm options
		            'wtermOptions' => array(
		                // linux-like command prompt
		                'PS1' => '%',
		            ),
		            // additional commands (see below)
		            'commands' => array(
		                'test' => array('js:function(){return "Hello, world!";}', 'Just a test.'),
		            ),
		            // uncomment to disable yiic
		            // 'useYiic' => false,
		
		            // adding custom yiic commands not from protected/commands dir
		            'yiicCommandMap' => array(
		                'migrate' => array(
		                    'class' => 'system.cli.commands.MigrateCommand',
		                    'interactive' => false,
		                ),
		            ),
		        ),
			),
			'behaviors' => array(
				'runAs' => array(
					'class' => 'application.components.WebApplicationBehavior',
				),
			),
			'preload' => array(
				'log',
			),
			'components' => array(
				'user' => array(
					'allowAutoLogin' => true,
				),
				'errorHandler' => array(
					// use 'site/error' action to display errors
					'errorAction' => 'site/error',
				),
				'log' => array(
					'class' => 'CLogRouter',
					'routes' => array(
						array(
							'class' => 'CFileLogRoute',
							'levels' => 'error, warning',
						),
                        [
                            'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',

                        ],
						// uncomment the following to show log messages on web pages
						/*
						array(
							'class'=>'CWebLogRoute',
						),
						*/
					),
				),
				
				'bootstrap' => array(
		            'class' => 'bootstrap.components.TbApi',   
		        ),
			),
			'params' => array(
				'regular' => array(
					'code' => '[code]',
				),
			),
		)
	);