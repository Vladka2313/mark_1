<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $login;
	public $password;
	public $rem;

	private $identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('login, password', 'required'),
			// rememberMe needs to be a boolean
			array('rem', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rem' => Yii::t('admin', 'remember-me'),
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute, $params)
	{
		if(!$this->hasErrors())
		{
			$this->identity = new UserIdentity($this->login, $this->password);
			switch($this->identity->authenticate())
			{
				case UserIdentity::ERROR_USERNAME_INVALID:
					$this->addError('login', Yii::t('admin', 'auth-invalid'));
					break;
				case UserIdentity::ERROR_PASSWORD_INVALID:
					$this->addError('password', Yii::t('admin', 'auth-invalid'));
					break;
			}
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function logIn()
	{
		if($this->identity === null)
		{
			$this->identity = new UserIdentity($this->login, $this->password);
			switch($this->identity->authenticate())
			{
				case UserIdentity::ERROR_USERNAME_INVALID:
					$this->addError('login', Yii::t('admin', 'auth-invalid'));
					break;
				case UserIdentity::ERROR_PASSWORD_INVALID:
					$this->addError('password', Yii::t('admin', 'auth-invalid'));
					break;
			}
		}
		if($this->identity->errorCode === UserIdentity::ERROR_NONE)
		{
			$duration = $this->rem ? 3600 * 24 * 30 : 0; // 30 days
			Yii::app()->user->login($this->identity, $duration);
			
			return true;
		}
		
		return false;
	}
}
