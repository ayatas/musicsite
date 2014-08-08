<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $bio
 * @property string $image
 * @property string $location
 * @property string $websites
 * @property string $userType
 * @property string $createdDate
 * @property string $lastLoginDate
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Artist[] $artists
 * @property Fan[] $fans
 */
class User extends CActiveRecord
{
	private $_identity;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, password', 'required','on'=>'create'),
			array('name, email', 'unique','on'=>'create'),
			array('name, password', 'required','on'=>'login'),
			array('password', 'authenticate','on'=>'login'),
			array('name, email, password, image, location, websites', 'length', 'max'=>45),
			array('userType', 'length', 'max'=>6),
			array('status', 'length', 'max'=>1),
			array('bio, createdDate, lastLoginDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, password, bio, image, location, websites, userType, createdDate, lastLoginDate, status', 'safe', 'on'=>'search'),
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
			'artists' => array(self::HAS_MANY, 'Artist', 'userId'),
			'fans' => array(self::HAS_MANY, 'Fan', 'userId'),
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
			'email' => 'Email',
			'password' => 'Password',
			'bio' => 'Bio',
			'image' => 'Image',
			'location' => 'Location',
			'websites' => 'Websites',
			'userType' => 'User Type',
			'createdDate' => 'Created Date',
			'lastLoginDate' => 'Last Login Date',
			'status' => 'Status',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('bio',$this->bio,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('websites',$this->websites,true);
		$criteria->compare('userType',$this->userType,true);
		$criteria->compare('createdDate',$this->createdDate,true);
		$criteria->compare('lastLoginDate',$this->lastLoginDate,true);
		$criteria->compare('status',$this->status,true);

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
	
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->name,$this->password,'user');
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}
	
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->name,$this->password,'user');
			$this->_identity->authenticate();
		}
		else
			return false;
	}
}
