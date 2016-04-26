<?php
	//
	class AddForm extends CFormModel
	{
		public $name;
		public $code;		
		/**
		 * Declares the validation rules.
		 */
		public function rules()
		{
			return array(
				array('name, code', 'required'),
				array('name', 'length', 'max' => 100),
				array('code', 'length', 'max' => 12),
				array('code', 'length', 'min' => 3),
				array('code','match', 'pattern'=>'/^0[0-9]+/')

			);
		}
	
		/**
		 * Declares customized attribute labels.
		 * If not declared here, an attribute would have a label that is
		 * the same as its name with the first letter in upper case.
		 */
		public function attributeLabels()
		{
			return array(
				'name' => Yii::t('models', 'name'),
				'code' => Yii::t('models', 'code'),
			);
		}
	}
