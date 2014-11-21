<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class User_workForm extends CFormModel
{
 	public $user_work_id;
 	public $user_id;
 	public $company_name;
 	public $company_address;
 	public $description;
 	public $periode;
 	
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
			array('user_id, company_name, company_address, description, periode', 'required'),
			array('user_id, periode', 'numerical', 'integerOnly'=>true),
			array('company_name', 'length', 'max'=>255),
		);
	}

	/**
	 * Declares attribute labels.
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
