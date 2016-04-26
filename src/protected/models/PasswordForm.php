<?php
	//
	class PasswordForm extends CFormModel
	{
		public $old;
		public $pass;
		public $repeat;
		
		public function rules()
		{
			return array(
				array('old, pass, repeat', 'required'),
				array('old, pass', 'length', 'min' => 8, 'max' => 50),
				array('repeat', 'compare', 'compareAttribute' => 'pass'),
			);
		}
		
		public function attributeLabels()
		{
			return array(
				'old' => Yii::t('models', 'old'),
				'pass' => Yii::t('models', 'pass'),
				'repeat' => Yii::t('models', 'repeat'),
			);
		}
	}
