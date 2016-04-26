<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'admin':
 * @property string $id
 * @property string $login
 * @property string $password
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('login, password', 'required'),
			array('login, password', 'length', 'max' => 50),
			array('id, login, password', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login',
			'password' => 'Password',
		);
	}
	
	/**
	 * 
	 */
	protected function beforeSave()
	{
		$this->password = crypt($this->password);
		return parent::beforeSave();
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('login', $this->login, true);
		$criteria->compare('password', $this->password, true);

		return new CActiveDataProvider($this, array('criteria' => $criteria));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Admin the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
