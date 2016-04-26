<?php

/**
 * This is the model class for table "city".
 *
 * The followings are the available columns in table 'city':
 * @property integer $id
 * @property string $name
 * @property string $code
 */
class City extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, code', 'required'),
			array('name', 'length', 'max'=>100),
			array('code', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, code', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'code' => 'Code',
		);
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
	public function search($options = array())
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition="code like '$this->code%'";
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		
		return new CActiveDataProvider($this, CMap::mergeArray(array(
			'criteria'=>$criteria,
		),$options));
	}
        /**
	 * 
	 */
        public function searchSimilarCode($code,$limit=20)
        {
                $criteria=new CDbCriteria;
                $criteria->condition="code like '$code%'";
                return new CActiveDataProvider($this, array('criteria' => $criteria, 'pagination' => array('pageSize' => $limit)));;
        }
	/**
	 * 
	 */
   	public function byPopularity($limit = 10)
	{
		$criteria = new CDbCriteria;
		
		$criteria->limit = $limit;
		$criteria->order = 'popular DESC';
		
		return new CActiveDataProvider($this, array('criteria' => $criteria, 'pagination' => array('pageSize' => $limit)));
	}
	
	public function findByText($words, $limit = 10)
	{
		

		/*$cod="";
		$flag=0;
		if(count($code[0])>0){
				foreach($code[0] as &$t){
						if(substr($t,0,1)!='0')
								$t='0'.$t;
						$t="code like '".$t."%'";
				}
				$cod=implode(" or ", $code[0]);
				$cod=" and (".$cod.")";
		}
		
		if($words=='')$flag=1;*/
		$criteria = new CDbCriteria;
		$criteria->select = '*, MATCH `name` AGAINST (\'' . $words . '\' IN BOOLEAN MODE) AS relevance';
		$criteria->condition = 'MATCH `name` AGAINST (\'' . $words . '\' IN BOOLEAN MODE)>0';
		$criteria->order = 'relevance DESC';
		$criteria->limit = $limit;

		
		return new CActiveDataProvider($this, array('criteria' => $criteria, 'pagination' => array('pageSize' => $limit)));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return City the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
