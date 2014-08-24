<?php

/**
 * This is the model class for table "cms_user".
 *
 * The followings are the available columns in table 'cms_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $created
 * @property integer $ban
 * @property integer $role
 * @property string $email
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_BANNED = 'banned';
    public $verifyCode;
    public $repeat_password;

	public function tableName()
	{
		return 'cms_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password,repeat_password, email', 'required'),
			array('created, ban, role', 'numerical', 'integerOnly'=>true),
			array('username','match', 'pattern'=>'/^([A-Za-z0-9 ]+)$/u', 'message'=>'Symbols accepted: A-Za-z0-9'),
			array('username', 'unique','message'=>'This username is already in use'),
			array('email', 'unique','message'=>'This email is already in use'),
			array('email','email'),
			array('username, password, repeat_password, email', 'length','min'=>5, 'max'=>50),
			array('password', 'compare', 'compareAttribute'=>'repeat_password'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'registration'),
			array('id, username, password, created, ban, role, email', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'created' => 'Created',
			'ban' => 'Ban',
			'role' => 'Role',
			'email' => 'Email',
			'verifyCode' => 'Input code',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('ban',$this->ban);
		$criteria->compare('role',$this->role);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->created = time();
			
		}
		$this->ban = 1;

		$this->password = sha1($this->password);
		return parent::beforeSave();
	}

	public static function all()
	{		
		return CHtml::listData(self::model()->findAll(), 'id', 'username');
	}
}
