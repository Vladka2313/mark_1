<?php
	// Файл возвращает массив с настройками приложения
	return array(
		'components' => array(
			'db' => array(
				'connectionString' => 'mysql:host=localhost;dbname=vorwahl',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => '',
				'charset' => 'utf8',
				'queryCacheID' => 'cache',
				'enableProfiling' => true,
				'enableParamLogging' => true,
				'schemaCachingDuration' => 1000,
			),
		),
	);
