<?php

/**
 * This is the model class for table "tbl_album".
 *
 * The followings are the available columns in table 'tbl_album':
 * @property integer $AlbumId
 * @property integer $GenreId
 * @property integer $ArtistId
 * @property string $Title
 * @property double $Price
 * @property string $AlbumThumbUrl
 * @property string $AlbumArtUrl
 * @property string $tracks
 * @property string $LinerNotes
 * @property string $mbid
 *
 * The followings are the available model relations:
 * @property Cart[] $carts
 * @property Orderdetail[] $orderdetails
 */
class Album extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_album';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('GenreId, ArtistId, Title', 'required'),
			array('GenreId, ArtistId', 'numerical', 'integerOnly'=>true),
			array('Price', 'numerical'),
			array('Title', 'length', 'max'=>160),
			array('AlbumThumbUrl, AlbumArtUrl', 'length', 'max'=>1024),
			array('mbid', 'length', 'max'=>50),
			array('tracks, LinerNotes', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('AlbumId, GenreId, ArtistId, Title, Price, AlbumThumbUrl, AlbumArtUrl, tracks, LinerNotes, mbid', 'safe', 'on'=>'search'),
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
			'carts' => array(self::HAS_MANY, 'Cart', 'AlbumId'),
			'orderdetails' => array(self::HAS_MANY, 'Orderdetail', 'AlbumId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'AlbumId' => 'Album',
			'GenreId' => 'Genre',
			'ArtistId' => 'Artist',
			'Title' => 'Title',
			'Price' => 'Price',
			'AlbumThumbUrl' => 'Album Thumb Url',
			'AlbumArtUrl' => 'Album Art Url',
			'tracks' => 'Tracks',
			'LinerNotes' => 'Liner Notes',
			'mbid' => 'Mbid',
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

		$criteria->compare('AlbumId',$this->AlbumId);
		$criteria->compare('GenreId',$this->GenreId);
		$criteria->compare('ArtistId',$this->ArtistId);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('Price',$this->Price);
		$criteria->compare('AlbumThumbUrl',$this->AlbumThumbUrl,true);
		$criteria->compare('AlbumArtUrl',$this->AlbumArtUrl,true);
		$criteria->compare('tracks',$this->tracks,true);
		$criteria->compare('LinerNotes',$this->LinerNotes,true);
		$criteria->compare('mbid',$this->mbid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Album the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
