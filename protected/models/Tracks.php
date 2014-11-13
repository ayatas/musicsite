<?php

/**
 * This is the model class for table "{{tracks}}".
 *
 * The followings are the available columns in table '{{tracks}}':
 * @property integer $id
 * @property integer $albumId
 * @property integer $artistId
 * @property string $name
 * @property string $slug
 * @property string $fileName
 * @property string $price
 * @property string $downloadable
 * @property string $payMore
 * @property string $description
 * @property string $downLoadDescription
 * @property string $lyrics
 * @property string $trackCredits
 * @property string $artist
 * @property string $image
 * @property string $tags
 * @property string $ISRC
 * @property string $releaseDate
 * @property string $createdDate
 * @property string $artistupdate
 * @property string $visibility
 *
 * The followings are the available model relations:
 * @property Collections[] $collections
 * @property Albums $album
 * @property Albums $artist0
 */
class Tracks extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tracks}}';
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
			array('albumId, artistId', 'numerical', 'integerOnly'=>true),
			array('name, price, artist, image, tags, ISRC', 'length', 'max'=>45),
			array('slug, fileName', 'length', 'max'=>225),
			array('downloadable, visibility', 'length', 'max'=>1),
			array('payMore', 'length', 'max'=>2),
			array('description, downLoadDescription, lyrics, trackCredits, releaseDate, createdDate, artistupdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, albumId, artistId, name, slug, fileName, price, downloadable, payMore, description, downLoadDescription, lyrics, trackCredits, artist, image, tags, ISRC, releaseDate, createdDate, artistupdate, visibility', 'safe', 'on'=>'search'),
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
			'collections' => array(self::HAS_MANY, 'Collections', 'trackId'),
			'album' => array(self::BELONGS_TO, 'Albums', 'albumId'),
			'artist0' => array(self::BELONGS_TO, 'Albums', 'artistId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'albumId' => 'Album',
			'artistId' => 'Artist',
			'name' => 'track name',
			'slug' => 'Slug',
			'fileName' => 'File Name',
			'price' => 'Price',
			'downloadable' => 'enable individual track download',
			'payMore' => 'Pay More',
			'description' => 'Description',
			'downLoadDescription' => 'Down Load Description',
			'lyrics' => 'Lyrics',
			'trackCredits' => 'Track Credits',
			'artist' => 'Artist',
			'image' => 'Image',
			'tags' => 'Tags',
			'ISRC' => 'Isrc',
			'releaseDate' => 'Release Date',
			'createdDate' => 'Created Date',
			'artistupdate' => 'Artistupdate',
			'visibility' => 'Visibility',
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
		$criteria->compare('albumId',$this->albumId);
		$criteria->compare('artistId',$this->artistId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('fileName',$this->fileName,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('downloadable',$this->downloadable,true);
		$criteria->compare('payMore',$this->payMore,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('downLoadDescription',$this->downLoadDescription,true);
		$criteria->compare('lyrics',$this->lyrics,true);
		$criteria->compare('trackCredits',$this->trackCredits,true);
		$criteria->compare('artist',$this->artist,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('ISRC',$this->ISRC,true);
		$criteria->compare('releaseDate',$this->releaseDate,true);
		$criteria->compare('createdDate',$this->createdDate,true);
		$criteria->compare('artistupdate',$this->artistupdate,true);
		$criteria->compare('visibility',$this->visibility,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tracks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
