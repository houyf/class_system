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
		$user_info = Admin::model()->find( 'username = :username', array(':username'=>$this->username) );
		if(!isset( $user_info -> password )) return  $this->errorCode=self::ERROR_USERNAME_INVALID;
		if($user_info -> password != $this -> password ) return $this->errorCode=self::ERROR_PASSWORD_INVALID;
		return  !($this->errorCode=self::ERROR_NONE);
	}
}










