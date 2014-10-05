<?php

/**
 * This is the model class for table "user_auth".
 *
 * The followings are the available columns in table 'user_auth':
 * @property integer $user_auth_id
 * @property integer $user_id
 * @property integer $user_role_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property UserRole $userRole
 */
class TUserAuth extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_auth';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, user_role_id', 'required'),
			array('user_id, user_role_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_auth_id, user_id, user_role_id', 'safe', 'on'=>'search'),
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
			'userRole' => array(self::BELONGS_TO, 'UserRole', 'user_role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_auth_id' => 'User Auth',
			'user_id' => 'User',
			'user_role_id' => 'User Role',
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

		$criteria->compare('user_auth_id',$this->user_auth_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_role_id',$this->user_role_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TUserAuth the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
