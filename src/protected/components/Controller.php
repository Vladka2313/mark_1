<?php
	//
	class Controller extends CController
	{
		public $layout = null;
		
		public $menu = array();
		public $breadcrumbs = array();
		
		public function tryIncludeCss($path, $media = '')
		{
			try
			{
				if(file_exists(Yii::app()->basePath . $path))
				{
					Yii::app()->clientScript->registerCssFile($path, $media);
					return true;
				}
			}
			catch(Exception $ex)
			{
				return false;
			}
		}
		
		public function tryIncludeJs($path, $into = CClientScript::POS_HEAD)
		{
			try
			{
				if(file_exists(Yii::app()->basePath . $path))
				{
					Yii::app()->clientScript->registerScriptFile($path, $into);
					return true;
				}
			}
			catch(Exception $ex)
			{
				return false;
			}
		}
		
		public function beforeAction($action)
		{
			$this->pageTitle = Yii::t('main', 'name');
			return parent::beforeAction($action);
		}
		
		public function beforeRender($view)
		{
			Yii::app()->bootstrap->register();
			
			$this->tryIncludeCss('/../css/' . Yii::app()->getName() . '/layout.' . basename($this->layout) . '.css');
			$this->tryIncludeCss('/../css/' . Yii::app()->getName() . '/' . $this->id . '/view.' . $view . '.css');

			$this->tryIncludeJs('/../js/' . Yii::app()->getName() . '/layout.' . basename($this->layout) . '.js');
			$this->tryIncludeJs('/../js/' . Yii::app()->getName() . '/' . $this->id . '/view.' . $view . '.js');
			
			return parent::beforeRender($view);
		}
	}