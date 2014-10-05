<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$users = TUser::model()->find(array('condition'=>'Username=:username','params'=>array(':username'=>$this->username)));
		/*$p = md5($this->password);
		$p2 = substr($p,0,5);
		$p3 = substr($p,5,-1);
		$p4 = substr($p,-1);
		$unix = md5(substr($p,-4));
		$uCod = substr($unix,0,4);
		$this->password = $p2.$uCod.$p3.$uCod.$p4;*/
		if($users===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users->password!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}