<?php

/**
 * This is the model class for table "user_work".
 *
 * The followings are the available columns in table 'user_work':
 * @property integer $user_work_id
 * @property integer $user_id
 * @property string $company_name
 * @property string $company_address
 * @property string $description
 * @property integer $periode
 *
 * The followings are the available model relations:
 * @property User $user
 */
class TUserWork extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_work';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, company_name, company_address, description, periode', 'required'),
			array('user_id, periode', 'numerical', 'integerOnly'=>true),
			array('company_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_work_id, user_id, company_name, company_address, description, periode', 'safe', 'on'=>'search'),
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
			'user_work_id' => 'User Work',
			'user_id' => 'User',
			'company_name' => 'Company Name',
			'company_address' => 'Company Address',
			'description' => 'Description',
			'periode' => 'Periode',
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

		$criteria->compare('user_work_id',$this->user_work_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('company_address',$this->company_address,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('periode',$this->periode);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TUserWork the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
