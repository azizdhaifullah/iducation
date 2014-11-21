<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class User_detailForm extends CFormModel
{
 	public $user_detail_id;
 	public $user_id;
 	public $mypicture;
 	public $FilePicture;
 	public $phone;
 	public $address;
 	public $religion;
 	public $bio;
 	public $aboutme;
 	
	public $saveType;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('user_id', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('mypicture', 'length', 'max'=>225),
			array('phone', 'length', 'max'=>18),
			array('address, aboutme', 'length', 'max'=>255),
			array('religion', 'length', 'max'=>11),
			array('bio', 'length', 'max'=>160),
			array('FilePicture', 'file', 'types'=>'jpg, jpeg, png, gif','wrongType'=>'Only jpg, png, gif allowed.','tooLarge'=>'The file was larger than 400K. Please upload a smaller file.', 'allowEmpty'=>true),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'user_detail_id' => 'User Detail',
			'user_id' => 'User',
			'mypicture' => 'My Picture',
			'phone' => 'Phone',
			'address' => 'Address',
			'religion' => 'Religion',
			'aboutme' => 'Aboutme',
			'bio' => 'Bio',
		);
	}

	public function save()
	{
		$data = new TUserAuth;
		if($this->saveType == "add"){
			$this->mypicture = '/images/user/'.$this->FileIcon->getName();
			
			$data->user_id = $this->user_id;
			$data->mypicture = $this->mypicture;
			$data->phone = $this->phone;
			$data->address = $this->address;
			$data->religion = $this->religion;
			$data->bio = $this->bio;
			$data->aboutme = $this->aboutme;
			$data->save();
		}else{
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
		$data->user_id = $this->user_id;
		$data->mypicture = $this->mypicture;
		$data->phone = $this->phone;
		$data->address = $this->address;
		$data->religion = $this->religion;
		$data->bio = $this->bio;
		$data->aboutme = $this->aboutme;
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
					$cekUser = TUserDetail::model()->find(array('condition'=>'user_id=:userid','params'=>array(':userid'=>$user->user_id)));
					if(empty($cekUser)){
						$return[$user->user_id] = $user->username;
					}
				}
			break;
			}
		return $return;
	}
}
