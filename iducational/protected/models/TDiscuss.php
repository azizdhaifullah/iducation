<?php

/**
 * This is the model class for table "discuss".
 *
 * The followings are the available columns in table 'discuss':
 * @property integer $discuss_id
 * @property string $discuss_name
 * @property integer $member
 * @property string $description
 * @property integer $parent_id
 * @property string $created_date
 * @property integer $created_by
 * @property string $modified_date
 * @property string $modified_by
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property UserInterest[] $userInterests
 */
class TDiscuss extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'discuss';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('discuss_name, description, parent_id', 'required'),
			array('member, parent_id, created_by', 'numerical', 'integerOnly'=>true),
			array('discuss_name, modified_by', 'length', 'max'=>20),
			array('description', 'length', 'max'=>180),
			array('created_date, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('discuss_id, discuss_name, member, description, parent_id, created_date, created_by, modified_date, modified_by', 'safe', 'on'=>'search'),
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
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'userInterests' => array(self::HAS_MANY, 'UserInterest', 'discuss_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'discuss_id' => 'Discuss',
			'discuss_name' => 'Discuss Name',
			'member' => 'Member',
			'description' => 'Description',
			'parent_id' => 'Parent',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'modified_date' => 'Modified Date',
			'modified_by' => 'Modified By',
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

		$criteria->compare('discuss_id',$this->discuss_id);
		$criteria->compare('discuss_name',$this->discuss_name,true);
		$criteria->compare('member',$this->member);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('modified_by',$this->modified_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TDiscuss the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
