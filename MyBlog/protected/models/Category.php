<?php

/**
 * This is the model class for table "cms_category".
 *
 * The followings are the available columns in table 'cms_category':
 * @property integer $id
 * @property string $title
 * @property integer $position
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, position', 'required'),
			array('position', 'length', 'max'=>30),
			array('title', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, position', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'position' => 'Position',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function all()
	{		
		return CHtml::listData(self::model()->findAll(), 'id', 'title');
	/*	$models = self::model()->findAll();
	    $array = array();
		foreach($models as $row)
		{
			$array[] = $row->title;			
		}
		return $array;
    */ 
	}

		public static function menu($position)
	{		
		$array = array();
		$models = self::model()->findAllByAttributes(array('position'=>$position));
		foreach($models as $row)
		{
			$array[] = array('label'=>$row->title, 'url'=>'/page/index/id/'.$row->id);
		}
		if($position=='top')
		{
			$array[] = array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest);
			$array[] = array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest);
			$array[] = array('label'=>'Registration', 'url'=>array('/site/registration'), 'visible'=>Yii::app()->user->isGuest);
			$array[] = array('label'=>'Contact', 'url'=>array('/site/contact'));


			if(Yii::app()->user->checkAccess('2'))
			{
				$array[] = array('label'=>'Admin', 'url'=>array('/admin'));
			}
		}
		return $array;



	}
}
