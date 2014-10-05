<?php

/**
 * This is the model class for table "status".
 *
 * The followings are the available columns in table 'status':
 * @property integer $status_id
 * @property integer $user_id
 * @property string $status_text
 * @property string $status_pict
 * @property string $status_file
 * @property integer $status_like
 * @property integer $status_comment
 * @property string $status_created_date
 * @property string $status_modified_date
 *
 * The followings are the available model relations:
 * @property User $user
 */
class TStatus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'status';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, status_created_date', 'required'),
			array('user_id, status_like, status_comment', 'numerical', 'integerOnly'=>true),
			array('status_text', 'length', 'max'=>200),
			array('status_pict, status_file', 'length', 'max'=>255),
			array('status_modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('status_id, user_id, status_text, status_pict, status_file, status_like, status_comment, status_created_date, status_modified_date', 'safe', 'on'=>'search'),
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
			'status_id' => 'Status',
			'user_id' => 'User',
			'status_text' => 'Status Text',
			'status_pict' => 'Status Pict',
			'status_file' => 'Status File',
			'status_like' => 'Status Like',
			'status_comment' => 'Status Comment',
			'status_created_date' => 'Status Created Date',
			'status_modified_date' => 'Status Modified Date',
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

		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status_text',$this->status_text,true);
		$criteria->compare('status_pict',$this->status_pict,true);
		$criteria->compare('status_file',$this->status_file,true);
		$criteria->compare('status_like',$this->status_like);
		$criteria->compare('status_comment',$this->status_comment);
		$criteria->compare('status_created_date',$this->status_created_date,true);
		$criteria->compare('status_modified_date',$this->status_modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TStatus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
