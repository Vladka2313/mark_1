<?php
	//
	class FrontController extends Controller
	{
		public $searchQuery = '';
		public $searchCode = '';
		
		/**
		 * 
		 */
		public function beforeAction($action)
		{
			$this->layout = '//main';
			return parent::beforeAction($action);
		}
	}