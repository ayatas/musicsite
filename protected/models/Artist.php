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
 * @property string $shoFanEmail
 * @property integer $genreId
 * @property string $genreTags
 * @property string $paypalEmail
 * @property string $currency
 * @property integer $yourLocation
 * @property integer $taxPercent
 * @property string $returnPolicy
 * @property string $shippingInfo
 * @property string $musicLink
 * @property string $merchLink
 * @property string $showNavigation
 * @property string $customHeader
 * @property string $showSocial
 * @property string $homePage
 * @property string $upcomingShows
 * @property string $songkickId
 * @property string $recommendedheading
 * @property string $albumUrl
 * @property string $albumDescription
 *
 * The followings are the available model relations:
 * @property Albums[] $albums
 * @property Genre $genre
 * @property User $user
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
			array('userId,url,bandName,fanEmail,shoFanEmail,paypalEmail,genreId', 'required','on'=>'update'),
			array('bandName,userId', 'required','on'=>'create,adminUpdate,adminUpdate'),
			array('userId, genreId, yourLocation, taxPercent', 'numerical', 'integerOnly'=>true),
			array('bandName, url, fanEmail, genreTags, paypalEmail, currency, customHeader', 'length', 'max'=>45),
			array('shoFanEmail, showNavigation, showSocial, homePage, upcomingShows', 'length', 'max'=>1),
			array('musicLink, merchLink, recommendedheading', 'length', 'max'=>255),
			array('songkickId', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, userId, bandName, url, fanEmail, shoFanEmail, genreId, genreTags, paypalEmail, currency, yourLocation, taxPercent, returnPolicy, shippingInfo, musicLink, merchLink, showNavigation, customHeader, showSocial, homePage, upcomingShows, songkickId, recommendedheading, albumUrl, albumDescription', 'safe', 'on'=>'search'),
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
			'genre' => array(self::BELONGS_TO, 'Genre', 'genreId'),
			'user' => array(self::BELONGS_TO, 'User', 'userId'),
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
			'shoFanEmail' => 'Sho Fan Email',
			'genreId' => 'Genre',
			'genreTags' => 'Genre Tags',
			'paypalEmail' => 'Paypal Email',
			'currency' => 'Currency',
			'yourLocation' => 'Your Location',
			'taxPercent' => 'Tax Percent',
			'returnPolicy' => 'Return Policy',
			'shippingInfo' => 'Shipping Info',
			'musicLink' => 'Music Link',
			'merchLink' => 'Merch Link',
			'showNavigation' => 'Show Navigation',
			'customHeader' => 'Custom Header',
			'showSocial' => 'Show Social',
			'homePage' => 'Home Page',
			'upcomingShows' => 'Upcoming Shows',
			'songkickId' => 'Songkick',
			'recommendedheading' => 'Recommendedheading',
			'albumUrl' => 'Album Url',
			'albumDescription' => 'Album Description',
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
		$criteria->compare('shoFanEmail',$this->shoFanEmail,true);
		$criteria->compare('genreId',$this->genreId);
		$criteria->compare('genreTags',$this->genreTags,true);
		$criteria->compare('paypalEmail',$this->paypalEmail,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('yourLocation',$this->yourLocation);
		$criteria->compare('taxPercent',$this->taxPercent);
		$criteria->compare('returnPolicy',$this->returnPolicy,true);
		$criteria->compare('shippingInfo',$this->shippingInfo,true);
		$criteria->compare('musicLink',$this->musicLink,true);
		$criteria->compare('merchLink',$this->merchLink,true);
		$criteria->compare('showNavigation',$this->showNavigation,true);
		$criteria->compare('customHeader',$this->customHeader,true);
		$criteria->compare('showSocial',$this->showSocial,true);
		$criteria->compare('homePage',$this->homePage,true);
		$criteria->compare('upcomingShows',$this->upcomingShows,true);
		$criteria->compare('songkickId',$this->songkickId,true);
		$criteria->compare('recommendedheading',$this->recommendedheading,true);
		$criteria->compare('albumUrl',$this->albumUrl,true);
		$criteria->compare('albumDescription',$this->albumDescription,true);

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
