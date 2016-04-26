<?php
	//
	class SiteController extends BackController
	{
		/**
		 * @return array action filters
		 */
		public function filters()
		{
			return array(
				'accessControl',
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
				array('deny',  // deny admin to perform 'login' action
					'actions' => array('login'),
					'users' => array('@'),
				),	
				array('allow', // allow admin to perform any actions
					'users' => array('@'),
				),
				array('allow',  // allow all users to perform 'login' action
					'actions' => array('login'),
					'users' => array('*'),
				),
				array('deny',  // deny all users to perform any actions
					'users' => array('*'),
				),
			);
		}
		
		/**
		 * 
		 */
		public function actionIndex()
		{
			$this->redirect(array('city/index'));	
		}
	
		/**
		 * 
		 */
		public function actionLogin()
		{
			$form = new LoginForm;
			
			if(isset($_POST['LoginForm']))
			{
				$form->attributes = $_POST['LoginForm'];	
				if($form->validate())
				{
					$form->logIn();
					$this->redirect(array('index'));
				}
			}
			
			$this->layout = '//login';
			$this->pageTitle .= ' - Login';
			$this->render('login', array('model' => $form));
		}

		/**
		 * 
		 */	
		public function actionLogout()
		{
			Yii::app()->user->logout();
			$this->redirect(array('login'));
		}
		
		/**
		 * 
		 */
		public function actionTags()
		{
			$mainTag = Setting::model()->findByAttributes(array('name' => 'main-tag'));
			$commonTag = Setting::model()->findByAttributes(array('name' => 'common-tag'));
			
			if(isset($_POST['Setting']))
			{
				switch($_POST['type'])
				{
					case 'main':
						$mainTag->value = $_POST['Setting']['value'];
						$mainTag->save();
						break;
					case 'common':
						$commonTag->value = $_POST['Setting']['value'];
						$commonTag->save();
						break;
				}
			}
			
			$this->render('tags', array(
				'mainTag' => $mainTag,
				'commonTag' => $commonTag,
			));
		}
		
		/**
		 * 
		 */
		public function actionTools($tab = 'login')
		{
			$user = User::model()->findByPk(Yii::app()->user->id);
			
			if(isset($_POST['User']) && $_POST['type'] === 'login')
			{
				$tab = 'login';
				$user->login = $_POST['User']['login'];
				
				if($user->saveAttributes(array('login')))
				{
					Yii::app()->user->setFlash('notification', Yii::t('admin', 'change-success'));
				}
				else
				{
					Yii::app()->user->setFlash('error', Yii::t('admin', 'change-fail'));
				}
			}
			
			$form = new PasswordForm;
			$form->unsetAttributes();
			
			if(isset($_POST['PasswordForm']) && $_POST['type'] === 'password')
			{
				$tab = 'password';	
				$form->attributes = $_POST['PasswordForm'];
			
				if(($user->password === crypt($form->old, $user->password)) && ($form->pass === $form->repeat))
				{
					$user->password = $form->pass;
					
					if($user->save())
					{
						Yii::app()->user->setFlash('notification', Yii::t('admin', 'change-success'));
					}
					else
					{
						Yii::app()->user->setFlash('error', Yii::t('admin', 'change-fail'));
					}
				}
			}
			
			$this->render('tools', array('user' => $user, 'form' => $form, 'tab' => $tab));
		}
		function actionAdd()
		{
			$form = new AddForm;
			
			if(isset($_POST['AddForm']))
			{
				$form->attributes = $_POST['AddForm'];
				
				$model = new City;
				$model->name = $form->name;
				$model->code = $form->code;
				
				if($model->save())
				{
					Yii::app()->user->setFlash('notification', Yii::t('main', 'send-success'));
					$this->redirect(array('index'));
				}
			}
			
			$this->pageTitle .= ' - ' . Yii::t('main', 'suggest-title');
			$this->render('add', array('model' => $form));
		}
	}
