<?php

/**
 * This is the model class for table "{{artist}}".
 *
 * The followings are the available columns in table '{{artist}}':
 * @property integer $id
 * @property integer $userId
 * @property string $bandName
 * @property string $url
 * @property string $fanEmail
 * @property integer $genreId
 * @property string $genreTags
 * @property string $paypalEmail
 * @property string $currency
 * @property string $showNavigation
 * @property string $customHeader
 * @property string $showSocial
 * @property string $homePage
 *
 * The followings are the available model relations:
 * @property Albums[] $albums
 * @property User $user
 * @property Genre $genre
 * @property Design[] $designs
 */
class Artist extends CActiveRecord
{
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
			array('userId, genreId', 'required'),
			array('userId, genreId', 'numerical', 'integerOnly'=>true),
			array('bandName, url, fanEmail, genreTags, paypalEmail, currency, customHeader, showSocial, homePage', 'length', 'max'=>45),
			array('showNavigation', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, userId, bandName, url, fanEmail, genreId, genreTags, paypalEmail, currency, showNavigation, customHeader, showSocial, homePage', 'safe', 'on'=>'search'),
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
			'albums' => array(self::HAS_MANY, 'Albums', 'artistId'),
			'user' => array(self::BELONGS_TO, 'User', 'userId'),
			'genre' => array(self::BELONGS_TO, 'Genre', 'genreId'),
			'designs' => array(self::HAS_MANY, 'Design', 'artistId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'userId' => 'User',
			'bandName' => 'Band Name',
			'url' => 'Url',
			'fanEmail' => 'Fan Email',
			'genreId' => 'Genre',
			'genreTags' => 'Genre Tags',
			'paypalEmail' => 'Paypal Email',
			'currency' => 'Currency',
			'showNavigation' => 'Show Navigation',
			'customHeader' => 'Custom Header',
			'showSocial' => 'Show Social',
			'homePage' => 'Home Page',
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
		$criteria->compare('userId',$this->userId);
		$criteria->compare('bandName',$this->bandName,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('fanEmail',$this->fanEmail,true);
		$criteria->compare('genreId',$this->genreId);
		$criteria->compare('genreTags',$this->genreTags,true);
		$criteria->compare('paypalEmail',$this->paypalEmail,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('showNavigation',$this->showNavigation,true);
		$criteria->compare('customHeader',$this->customHeader,true);
		$criteria->compare('showSocial',$this->showSocial,true);
		$criteria->compare('homePage',$this->homePage,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Artist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
