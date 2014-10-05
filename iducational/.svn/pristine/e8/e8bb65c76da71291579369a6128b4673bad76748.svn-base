<?php

/**
 * This is the model class for table "lesson".
 *
 * The followings are the available columns in table 'lesson':
 * @property integer $lessson_id
 * @property integer $class_id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property string $attach
 * @property string $start_date
 * @property string $end_date
 *
 * The followings are the available model relations:
 * @property Class $class
 * @property User $user
 */
class TLesson extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lesson';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_id, user_id, title, content, attach, start_date, end_date', 'required'),
			array('class_id, user_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>20),
			array('content, attach', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('lessson_id, class_id, user_id, title, content, attach, start_date, end_date', 'safe', 'on'=>'search'),
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
			'class' => array(self::BELONGS_TO, 'Class', 'class_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'lessson_id' => 'Lessson',
			'class_id' => 'Class',
			'user_id' => 'User',
			'title' => 'Title',
			'content' => 'Content',
			'attach' => 'Attach',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
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

		$criteria->compare('lessson_id',$this->lessson_id);
		$criteria->compare('class_id',$this->class_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('attach',$this->attach,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TLesson the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
