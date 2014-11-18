<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class User_roleForm extends CFormModel
{
 	public $user_role_name;
	public $user_role_description;
	public $saveType;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('user_role_name, user_role_description, saveType', 'required'),
			array('user_role_name', 'length', 'max'=>15),
			array('user_role_description', 'length', 'max'=>255),
			
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'user_role_name' => 'User Role Name',
			'user_role_description' => 'User Role Description',
		);
	}

	public function save(){
		if($this->saveType == "add"){
			$data = new TUserRole;
			$data->user_role_name = $this->user_role_name;
			$data->user_role_description = $this->user_role_description;
			$data->save();
		}else{
			$data = new TUserRole;
			$data->updateByPk($_GET['i'],array(
	                'user_role_name'=>$this->user_role_name,
	                'user_role_description'=> $this->user_role_description));
		}
	}

	public function edit($i){
		$criteria = new CDbCriteria;
		$criteria->addSearchCondition('user_role_id',$i,true,'=');
		$data=TUserRole::model()->find($criteria);
		$this->user_role_name = $data->user_role_name;
		$this->user_role_description = $data->user_role_description;
		$this->saveType = 'edit';
	}
}
