<?php

class UserIdentity extends CUserIdentity
{
	public function authenticate()
	{
		// $user_info = Student::model()->find( 'login_name = :username', array(':username'=>$this->username) );
		$criteria = new CDbCriteria ;
		$criteria -> addCondition('is_check=1');
		$criteria -> addCondition('login_name="' . $this -> username . '"');
		$user_info = Student::model() -> find($criteria);
		if(!isset( $user_info -> login_psw )) return  $this->errorCode=self::ERROR_USERNAME_INVALID;
		if($user_info -> login_psw != $this -> password ) return $this->errorCode=self::ERROR_PASSWORD_INVALID;
		$this -> setState('student_name', $user_info ->student_name);
		$this -> setState('student_id', $user_info -> student_id);
		$this -> setState('class_id', $user_info -> class_id);
		return  !($this->errorCode=self::ERROR_NONE);
	}
} 

