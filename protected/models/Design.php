<?php

/**
 * This is the model class for table "{{design}}".
 *
 * The followings are the available columns in table '{{design}}':
 * @property integer $id
 * @property integer $artistId
 * @property string $bodyColor
 * @property string $textColor
 * @property string $secondaryTextColor
 * @property string $linkColor
 * @property string $backgroundColor
 * @property string $backgroundImage
 * @property string $backgroundRepeat
 * @property string $align
 *
 * The followings are the available model relations:
 * @property Artist $artist
 */
class Design extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{design}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('artistId', 'required'),
			array('artistId', 'numerical', 'integerOnly'=>true),
			array('bodyColor, textColor, secondaryTextColor, linkColor, backgroundColor','match', 'pattern' => '/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
            'message' => 'Invalid color code.'),
			array('bodyColor, textColor, secondaryTextColor, linkColor, backgroundColor, backgroundImage, backgroundRepeat, align', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, artistId, bodyColor, textColor, secondaryTextColor, linkColor, backgroundColor, backgroundImage, backgroundRepeat, align', 'safe', 'on'=>'search'),
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
			'artist' => array(self::BELONGS_TO, 'Artist', 'artistId'),
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
			'bodyColor' => 'Body Color',
			'textColor' => 'Text Color',
			'secondaryTextColor' => 'Secondary Text Color',
			'linkColor' => 'Link Color',
			'backgroundColor' => 'Background Color',
			'backgroundImage' => 'Background Image',
			'backgroundRepeat' => 'Background Repeat',
			'align' => 'Align',
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
		$criteria->compare('bodyColor',$this->bodyColor,true);
		$criteria->compare('textColor',$this->textColor,true);
		$criteria->compare('secondaryTextColor',$this->secondaryTextColor,true);
		$criteria->compare('linkColor',$this->linkColor,true);
		$criteria->compare('backgroundColor',$this->backgroundColor,true);
		$criteria->compare('backgroundImage',$this->backgroundImage,true);
		$criteria->compare('backgroundRepeat',$this->backgroundRepeat,true);
		$criteria->compare('align',$this->align,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Design the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
