<?php
	//
	class SiteController extends FrontController
	{
		/**
		 * @return array action filters
		 */
		public function filters()
		{
			return array(
				'accessControl', // perform access control for CRUD operations
			);
		}
	
		/**
		 * Specifies the access control rules.
		 * This method is used by the 'accessControl' filter.
		 * @return array access control rules
		 */
		public function accessRules()
		{
			return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
					'actions' => array('index', 'search', 'suggest', 'captcha', 'error'),
					'users' => array('*'),
				),
				array('deny',  // deny all users
					'users' => array('*'),
				),
			);
		}
		 
		/**
		 * Declares class-based actions.
		 */
		public function actions()
		{
			return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha' => array(
					'class' => 'CCaptchaAction',
					'backColor' => 0xFFFFFF,
				),
			);
		}
	
		/**
		 * This is the default 'index' action that is invoked
		 * when an action is not explicitly requested by users.
		 */
		public function actionIndex()
		{
			$question = new City;
			//$link = new QuestionAnswer;
			
			$this->pageTitle = Setting::getMainTag();
			$this->render('index', array(
				'popular' => $question->byPopularity(20)->getData(),
			));
		} 
		
		/**
		 * 
		 */
		public function actionSearch()
		{
			if(isset($_GET['token']))
			{
				$this->searchQuery = $_GET['token'];
				preg_match_all('/[0-9]+/',$this->searchQuery,$code);
				
				$name = preg_replace('/[0-9]+/', '', $this->searchQuery);
				$words = preg_replace(array('/(\W+)/u', '/(\w+)/u'), array(' ', '$1*'), $name);
				$city= new City;
				$count = 20;
				Yii::app()->clientScript->registerMetaTag('noindex, nofollow', 'robots');
				$this->pageTitle .= ' - ' . Yii::t('main', 'seacrh-title-tag');
				if(count($code[0])!=0){
						$this->redirect(array('vorwahl/'.$code[0][0]));
				}
				else {
						
				
				
				$this->render('search', array(
					'cities' => $city->findByText($words, $count)->getData(),
					'max' => $count,
				));
				}
			}
			else
			{
				$this->redirect(array('index'));	
			}
		}
	
		/**
		 * This is the action to handle external exceptions.
		 */
		public function actionError()
		{
			if($error = Yii::app()->errorHandler->error)
			{
				if(Yii::app()->request->isAjaxRequest)
				{
					echo $error['message'];
				}
				else 
				{
					$this->pageTitle .= ' - ' . Yii::t('main', 'error-title-tag');
					$this->render('error', $error);
				}
			}
		}
	

	}
