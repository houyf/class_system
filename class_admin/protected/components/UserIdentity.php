<?php

class UserIdentity extends CUserIdentity
{
	public function authenticate()
	{
		$user_info = Admin::model()->find( 'username = :username', array(':username'=>$this->username) );
		if(!isset( $user_info -> password )) return  $this->errorCode=self::ERROR_USERNAME_INVALID;
		if($user_info -> password != $this -> password ) return $this->errorCode=self::ERROR_PASSWORD_INVALID;
		$this -> setState('last_logintime', $user_info->last_logintime );
		$user_info -> last_logintime = date("Y-m-d H:i:s",time());
		$this -> setState('class_id', $user_info->class_id);
		$this -> setState('level', $user_info -> level );
		$this -> setState('username', $user_info -> real_name);
		return  !($this->errorCode=self::ERROR_NONE);
	}
}

