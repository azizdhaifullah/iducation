<?php

/**
 * This is the model class for table "class".
 *
 * The followings are the available columns in table 'class':
 * @property integer $class_id
 * @property integer $teacher_id
 * @property string $class_name
 * @property string $description
 * @property string $class_code
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 *
 * The followings are the available model relations:
 * @property Lesson[] $lessons
 * @property Student[] $students
 */
class TClass extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('teacher_id, class_name, description, class_code, created_date, modified_date', 'required'),
			array('teacher_id', 'numerical', 'integerOnly'=>true),
			array('class_name', 'length', 'max'=>25),
			array('class_code', 'length', 'max'=>255),
			array('modified_by', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('class_id, teacher_id, class_name, description, class_code, created_date, modified_by, modified_date', 'safe', 'on'=>'search'),
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
			'lessons' => array(self::HAS_MANY, 'Lesson', 'class_id'),
			'students' => array(self::HAS_MANY, 'Student', 'class_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'class_id' => 'Class',
			'teacher_id' => 'Teacher',
			'class_name' => 'Class Name',
			'description' => 'Description',
			'class_code' => 'Class Code',
			'created_date' => 'Created Date',
			'modified_by' => 'Modified By',
			'modified_date' => 'Modified Date',
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

		$criteria->compare('class_id',$this->class_id);
		$criteria->compare('teacher_id',$this->teacher_id);
		$criteria->compare('class_name',$this->class_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('class_code',$this->class_code,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_by',$this->modified_by,true);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TClass the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
