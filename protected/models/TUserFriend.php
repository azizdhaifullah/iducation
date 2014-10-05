<?php

/**
 * This is the model class for table "user_friend".
 *
 * The followings are the available columns in table 'user_friend':
 * @property integer $user_friend_id
 * @property integer $user_id
 * @property integer $friend_id
 * @property integer $friend_status_id
 *
 * The followings are the available model relations:
 * @property FriendStatus $friendStatus
 */
class TUserFriend extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_friend';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, friend_id, friend_status_id', 'required'),
			array('user_id, friend_id, friend_status_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_friend_id, user_id, friend_id, friend_status_id', 'safe', 'on'=>'search'),
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
			'friendStatus' => array(self::BELONGS_TO, 'FriendStatus', 'friend_status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_friend_id' => 'User Friend',
			'user_id' => 'User',
			'friend_id' => 'Friend',
			'friend_status_id' => 'Friend Status',
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

		$criteria->compare('user_friend_id',$this->user_friend_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('friend_id',$this->friend_id);
		$criteria->compare('friend_status_id',$this->friend_status_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TUserFriend the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
