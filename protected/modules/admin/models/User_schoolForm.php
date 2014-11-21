<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class User_schoolForm extends CFormModel
{
 	public $user_school_id;
 	public $user_id;
 	public $school;
 	public $graduate;
 	public $description;
 	
	public $saveType;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, school, graduate, description', 'required'),
			array('user_id, graduate', 'numerical', 'integerOnly'=>true),
			array('school', 'length', 'max'=>255),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'user_school_id' => 'User School',
			'user_id' => 'User',
			'school' => 'School',
			'graduate' => 'Graduate',
			'description' => 'Description',
		);
	}

	public function save()
	{
		if($this->saveType == "add"){
			$data = new TUserAuth;
			$data->user_id = $this->user_id;
			$data->user_role_id = $this->user_role_id;
			$data->save();
		}else{
			$data = new TUserAuth;
			$data->updateByPk($_GET['i'],array(
	                'user_id'=>$this->user_id,
	                'user_role_id'=> $this->user_role_id));
		}
	}

	public function edit($i)
	{
		$criteria = new CDbCriteria;
		$criteria->addSearchCondition('user_auth_id',$i,true,'=');
		$data=TUserAuth::model()->find($criteria);
		$this->user_id = $data->user_id;
		$this->user_role_id = $data->user_role_id;
		$this->saveType = 'edit';
	}

	public function dataSource($object)
	{
		switch($object){
			case 'role' :
				$userrole = TUserRole::model()->findAll();
				foreach($userrole as $key => $role){
					$return[$role->user_role_id] = $role->user_role_name;
				}
			break;
			case 'user' :
				$datauser = TUser::model()->findAll();
				foreach($datauser as $key => $user){
					$return[$user->user_id] = $user->username;
				}
			break;
			}
		return $return;
	}
}
