<?php
	//ini_set('date.timezone', 'Europe/Kiev');

	$yii = dirname(__FILE__) . '/yii/framework/yii.php';
	$config = dirname(__FILE__) . '/protected/config/front.php';

	defined('YII_DEBUG') or define('YII_DEBUG', true);
	defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

	require_once($yii);
	Yii::createWebApplication($config) -> runEnd('front');
