<?php
	//
	class BackController extends Controller
	{
		public function beforeAction($action)
		{
			$this->layout = '//main';
			return parent::beforeAction($action);
		}
	}