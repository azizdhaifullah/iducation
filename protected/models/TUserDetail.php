<?php

/**
 * This is the model class for table "user_detail".
 *
 * The followings are the available columns in table 'user_detail':
 * @property integer $user_detail_id
 * @property integer $user_id
 * @property string $mypicture
 * @property string $phone
 * @property string $address
 * @property string $religion
 * @property string $aboutme
 * @property string $bio
 *
 * The followings are the available model relations:
 * @property User $user
 */
class TUserDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, mypicture', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('mypicture', 'length', 'max'=>225),
			array('phone', 'length', 'max'=>18),
			array('address, aboutme', 'length', 'max'=>255),
			array('religion', 'length', 'max'=>11),
			array('bio', 'length', 'max'=>160),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_detail_id, user_id, mypicture, phone, address, religion, aboutme, bio', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_detail_id' => 'User Detail',
			'user_id' => 'User',
			'mypicture' => 'Mypicture',
			'phone' => 'Phone',
			'address' => 'Address',
			'religion' => 'Religion',
			'aboutme' => 'Aboutme',
			'bio' => 'Bio',
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

		$criteria->compare('user_detail_id',$this->user_detail_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('mypicture',$this->mypicture,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('aboutme',$this->aboutme,true);
		$criteria->compare('bio',$this->bio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TUserDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
