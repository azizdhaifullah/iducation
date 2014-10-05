<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class UserForm extends CFormModel
{
	public $user_id;
	public $username;
	public $password;
	public $fullname;
	public $email;
	public $user_date;
	public $gender;
	public $user_created_date;
	public $user_modified_by;
	public $user_modified_date;
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
			array('username, password, fullname, email, user_date, gender, saveType', 'required'),
			array('username', 'length', 'max'=>20),
			array('password', 'length', 'max'=>255),
			array('fullname, email', 'length', 'max'=>50),
			array('gender', 'length', 'max'=>1),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'password' => 'Password',
			'fullname' => 'Fullname',
			'email' => 'Email',
			'user_date' => 'Date',
			'gender' => 'Gender'
		);
	}

	public function save(){
		$data = new TUSer;
		$d = strtotime($this->user_date);
		$date = date("Y-m-d", $d);
		$this->user_created_date = date("Y-m-d H:i:s"); 
		$p = md5($this->password);
		$p2 = substr($p,0,5);
		$p3 = substr($p,5,-1);
		$p4 = substr($p,-1);
		$unix = md5(substr($p,-4));
		$uCod = substr($unix,0,4);
		$this->password = $p2.$uCod.$p3.$uCod.$p4;
		if($this->saveType=='add'){
			$data->username = $this->username;
			$data->password = $this->password;
			$data->fullname = $this->fullname;
			$data->email = $this->email;
			$data->user_date = $this->user_date;
			$data->gender = $this->gender;
			$data->user_created_date = $this->user_created_date;
			$data->user_modified_by = $this->user_modified_by;
			$data->user_modified_date = $this->user_modified_date;
			$data->save();
		}else{
			$data->updateByPk($_GET['i'],array(
                'username'=>$this->username,
                'password'=>$this->pasword,
                'fullname'=> $this->pasword,
                'email'=>$this->email,
                'user_date'=>$this->user_date,
                'gender'=>$this->gender,
                'user_modified_by'=> $this->username,
                'user_modified_date'=> date("Y-m-d H:i:s")));
		}
	}

	public function edit(){
		$i=$_GET['i'];
		$criteria = new CDbCriteria;
		$criteria->addSearchCondition('user_id',$i,true,'=');
		$data=TUSer::model()->find($criteria);
		$this->username = $data->username;
		$this->password = $data->password;
		$this->fullname = $data->fullname;
		$this->email = $data->email;
		$this->user_date = $data->user_date;
		$this->gender = $data->gender;
		$this->user_created_date = $data->user_created_date;
		$this->user_modified_by = $data->user_modified_by;
		$this->user_modified_date = $data->user_modified_date;
		$this->saveType = 'edit';
	}

	public function getGenderOption(){
		return array('1'=>'Male','2'=>'Female');
	}
}
