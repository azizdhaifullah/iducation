<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $user_id;
	public $unix;
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

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
			array('username, password', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>'Username',
			'password'=>'Password',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		$u = $this->username;
		$p = md5($this->password);
		$p2 = substr($p,0,5);
		$p3 = substr($p,5,-1);
		$p4 = substr($p,-1);
		$unix = md5(substr($p,-4));
		$uCod = substr($unix,0,4);
		$tp = $p2.$uCod.$p3.$uCod.$p4;
		$filterBy = 'Username';
		$criteria = new CDbCriteria;
		$criteria->addSearchCondition('Username',$u,'TRUE');
		$data = TUser::model()->find($criteria);

		if(isset($data)){
			/*Yii::app()->user->setState('userid',$data->userid);
			Yii::app()->user->setState('Fullname',$data->Fullname);*/
			
			if($data->password==$tp2){
				Yii::app()->request->redirect(Yii::app()->createUrl('admin/dashboard'));
			}else{
				Yii::app()->user->setFlash('Error','Worng Password !');
			}
		}else{
			Yii::app()->user->setFlash('Error','Worng Username !');
		}
		$this->unsetAttributes(array('username','password'));   
	}
}
