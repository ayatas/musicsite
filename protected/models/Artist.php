<?php

/**
 * This is the model class for table "{{artist}}".
 *
 * The followings are the available columns in table '{{artist}}':
 * @property integer $id
 * @property integer $userId
 * @property string $userName
 * @property string $email
 * @property string $password
 * @property string $bandName
 * @property string $url
 * @property string $bio
 * @property string $websites
 * @property string $image
 * @property string $location
 * @property string $fanEmail
 * @property integer $Genre
 * @property string $genreTags
 * @property string $paypalEmail
 * @property integer $transactionCurrency
 * @property string $createdDate
 * @property string $lastLoginDate
 * @property string $status
 */
class Artist extends CActiveRecord
{
	public $TermsCondition;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{artist}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(
				'userName, email, password, bandName',
				'required'
			),
			array(
				'url, bio, websites, image, location, fanEmail, Genre, genreTags, paypalEmail, transactionCurrency, status',
				'required',
				'on' => 'update'
			),
			array(
				'userId, Genre, transactionCurrency',
				'numerical',
				'integerOnly' => true
			),
			array(
				'userName, password, bandName, url, image, location, fanEmail, genreTags',
				'length',
				'max' => 225
			),
			array(
				'email, paypalEmail',
				'length',
				'max' => 100
			),
			array(
				'status',
				'length',
				'max' => 1
			),
			array(
				'email',
				'email',
				'message' => 'Invalid email address!'
			),
			array(
				'userId, userName, email',
				'unique',
				'message' => '{attribute} already exists!',
			),
			array(
				'TermsCondition',
				'compare',
				'compareValue' => 1,
				'message' => 'You should accept term and conditions'
			),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(
				'id, userId, userName, email, password, bandName, url, bio, websites, image, location, fanEmail, Genre, genreTags, paypalEmail, transactionCurrency, createdDate, lastLoginDate, status',
				'safe',
				'on' => 'search'
			),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'userId' => 'User',
			'userName' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'bandName' => 'Artist/Band name',
			'url' => 'Url',
			'bio' => 'Bio',
			'websites' => 'Websites',
			'image' => 'Image',
			'location' => 'Location',
			'fanEmail' => 'Fan Email',
			'Genre' => 'Genre',
			'genreTags' => 'Genre Tags',
			'paypalEmail' => 'Paypal Email',
			'transactionCurrency' => 'Transaction Currency',
			'createdDate' => 'Created Date',
			'lastLoginDate' => 'Last Login Date',
			'TermsCondition' => 'I have read and agree to the',
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

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('userId', $this->userId);
		$criteria->compare('userName', $this->userName, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('bandName', $this->bandName, true);
		$criteria->compare('url', $this->url, true);
		$criteria->compare('bio', $this->bio, true);
		$criteria->compare('websites', $this->websites, true);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('location', $this->location, true);
		$criteria->compare('fanEmail', $this->fanEmail, true);
		$criteria->compare('Genre', $this->Genre);
		$criteria->compare('genreTags', $this->genreTags, true);
		$criteria->compare('paypalEmail', $this->paypalEmail, true);
		$criteria->compare('transactionCurrency', $this->transactionCurrency);
		$criteria->compare('createdDate', $this->createdDate, true);
		$criteria->compare('lastLoginDate', $this->lastLoginDate, true);
		$criteria->compare('status', $this->status, true);

		return new CActiveDataProvider($this, array('criteria' => $criteria, ));
	}

	public function getRandomNumber()
	{

		$random = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
		if ($this->model()->findByAttributes(array("userId" => $random))) {
			$random = $this->getRandomNumber();
		}
		
		return $random;
	}

	public function beforeSave()
	{
		$this->userId = $this->getRandomNumber();
		return true;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Artist the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

}
