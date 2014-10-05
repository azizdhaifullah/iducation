<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $comment_id
 * @property integer $type_id
 * @property string $type
 * @property string $comment_text
 * @property string $comment_pict
 * @property string $comment_created_by
 * @property string $comment_created_date
 * @property string $comment_modified_by
 * @property string $comment_modified_date
 */
class TComment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, type, comment_created_by, comment_created_date', 'required'),
			array('type_id', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>30),
			array('comment_text, comment_pict', 'length', 'max'=>255),
			array('comment_created_by, comment_modified_by', 'length', 'max'=>20),
			array('comment_modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('comment_id, type_id, type, comment_text, comment_pict, comment_created_by, comment_created_date, comment_modified_by, comment_modified_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comment_id' => 'Comment',
			'type_id' => 'Type',
			'type' => 'Type',
			'comment_text' => 'Comment Text',
			'comment_pict' => 'Comment Pict',
			'comment_created_by' => 'Comment Created By',
			'comment_created_date' => 'Comment Created Date',
			'comment_modified_by' => 'Comment Modified By',
			'comment_modified_date' => 'Comment Modified Date',
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

		$criteria->compare('comment_id',$this->comment_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('comment_text',$this->comment_text,true);
		$criteria->compare('comment_pict',$this->comment_pict,true);
		$criteria->compare('comment_created_by',$this->comment_created_by,true);
		$criteria->compare('comment_created_date',$this->comment_created_date,true);
		$criteria->compare('comment_modified_by',$this->comment_modified_by,true);
		$criteria->compare('comment_modified_date',$this->comment_modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TComment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
