<?php

/**
 * This is the model class for table "{{albums}}".
 *
 * The followings are the available columns in table '{{albums}}':
 * @property integer $id
 * @property integer $artistId
 * @property string $name
 * @property string $releaseDate
 * @property string $price
 * @property string $payMore
 * @property string $downLoadDescription
 * @property string $image
 * @property string $artist
 * @property string $description
 * @property string $credits
 * @property string $tags
 * @property string $upc_ean
 * @property string $visibility
 * @property string $createdDate
 * @property string $updatedDate
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Tarcks[] $tarcks
 * @property Tarcks[] $tarcks1
 */
class Albums extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{albums}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('artistId, name', 'required'),
			array('artistId', 'numerical', 'integerOnly'=>true),
			array('name, price, image, artist, tags, upc_ean', 'length', 'max'=>45),
			array('payMore, visibility, status', 'length', 'max'=>1),
			array('description, releaseDate, credits, downLoadDescription, createdDate, updatedDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, artistId, name, releaseDate, price, payMore, image, downLoadDescription, artist, description, credits, tags, upc_ean, visibility, createdDate, updatedDate, status', 'safe', 'on'=>'search'),
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
			'tarcks' => array(self::HAS_MANY, 'Tarcks', 'albumId'),
			'tarcks1' => array(self::HAS_MANY, 'Tarcks', 'artistId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'artistId' => 'Artist',
			'name' => 'Album Title',
			'releaseDate' => 'release date',
			'price' => 'pricing',
			'payMore' => 'Pay More',
			'downLoadDescription' => 'Down Load Description',
			'image' => 'Image',
			'artist' => 'artist',
			'description' => 'about this album',
			'credits' => 'album credits',
			'tags' => 'tags',
			'upc_ean' => 'album UPC/EAN code',
			'visibility' => 'Visibility',
			'createdDate' => 'Created Date',
			'updatedDate' => 'Updated Date',
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
		$criteria->compare('artistId',$this->artistId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('releaseDate',$this->releaseDate,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('payMore',$this->payMore,true);
		$criteria->compare('downLoadDescription',$this->downLoadDescription,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('artist',$this->artist,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('credits',$this->credits,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('upc_ean',$this->upc_ean,true);
		$criteria->compare('createdDate',$this->createdDate,true);
		$criteria->compare('updatedDate',$this->updatedDate,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Albums the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
