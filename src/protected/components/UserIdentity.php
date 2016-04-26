<?php
	//
	class UserIdentity extends CUserIdentity
	{
		private $id;
		
		public function authenticate()
		{
			$admin = User::model()->findByAttributes(array('login' => $this->username));
			
			if(!$admin)
			{
				$this->errorCode = self::ERROR_USERNAME_INVALID;
			}
			else if($admin->password !== crypt($this->password, $admin->password))
			{
				$this->errorCode = self::ERROR_PASSWORD_INVALID;
			}
			else
			{
				$this->errorCode = self::ERROR_NONE;
			}
			
			$this->id = $admin->id;
			return $this->errorCode;
		}
		
		public function getId()
		{
			return $this->id;
		}
	}