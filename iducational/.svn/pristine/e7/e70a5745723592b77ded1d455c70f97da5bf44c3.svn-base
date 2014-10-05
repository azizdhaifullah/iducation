<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property string $email
 * @property string $user_date
 * @property string $gender
 * @property string $user_created_date
 * @property string $user_modified_by
 * @property string $user_modified_date
 *
 * The followings are the available model relations:
 * @property Article[] $articles
 * @property Discuss[] $discusses
 * @property Lesson[] $lessons
 * @property Message[] $messages
 * @property Message[] $messages1
 * @property Status[] $statuses
 * @property Student[] $students
 * @property UserAuth[] $userAuths
 * @property UserDetail[] $userDetails
 * @property UserInterest[] $userInterests
 * @property UserSchool[] $userSchools
 * @property UserWork[] $userWorks
 */
class TUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, fullname, email, user_date, gender, user_created_date', 'required'),
			array('username, user_modified_by', 'length', 'max'=>20),
			array('password', 'length', 'max'=>255),
			array('fullname, email', 'length', 'max'=>50),
			array('gender', 'length', 'max'=>1),
			array('user_modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, username, password, fullname, email, user_date, gender, user_created_date, user_modified_by, user_modified_date', 'safe', 'on'=>'search'),
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
			'articles' => array(self::HAS_MANY, 'Article', 'created_by'),
			'discusses' => array(self::HAS_MANY, 'Discuss', 'created_by'),
			'lessons' => array(self::HAS_MANY, 'Lesson', 'user_id'),
			'messages' => array(self::HAS_MANY, 'Message', 'receive_id'),
			'messages1' => array(self::HAS_MANY, 'Message', 'send_id'),
			'statuses' => array(self::HAS_MANY, 'Status', 'user_id'),
			'students' => array(self::HAS_MANY, 'Student', 'user_id'),
			'userAuths' => array(self::HAS_MANY, 'UserAuth', 'user_id'),
			'userDetails' => array(self::HAS_MANY, 'UserDetail', 'user_id'),
			'userInterests' => array(self::HAS_MANY, 'UserInterest', 'user_id'),
			'userSchools' => array(self::HAS_MANY, 'UserSchool', 'user_id'),
			'userWorks' => array(self::HAS_MANY, 'UserWork', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'username' => 'Username',
			'password' => 'Password',
			'fullname' => 'Fullname',
			'email' => 'Email',
			'user_date' => 'User Date',
			'gender' => 'Gender',
			'user_created_date' => 'User Created Date',
			'user_modified_by' => 'User Modified By',
			'user_modified_date' => 'User Modified Date',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('user_date',$this->user_date,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('user_created_date',$this->user_created_date,true);
		$criteria->compare('user_modified_by',$this->user_modified_by,true);
		$criteria->compare('user_modified_date',$this->user_modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
