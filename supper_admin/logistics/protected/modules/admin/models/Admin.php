<?php

/**
 * This is the model class for table "admin".
 *
 * The followings are the available columns in table 'admin':
 * @property integer $admin_id
 * @property string $username
 * @property string $password
 * @property integer $lock
 * @property integer $level
 * @property integer $real_name
 * @property string $last_logintime
 */
class Admin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Admin the static model class
	 */

	public $old_username;
	public $old_password;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, last_logintime, level, real_name, email', 'required'),
			array('lock', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>100),
			array('password', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('admin_id, username, password, lock, real_name, last_logintime, email, send_email, level', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'admin_id' => '管理员ID',
			'username' => '登录用户名',
			'password' => '登录密码',
			'lock' => '是否被锁定',
			'last_logintime' => '上一次登录时间',
			'email' => '邮箱地址',
			'send_email' => '是否启动邮箱提醒功能',
			'real_name' => '管理员名称'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('admin_id',$this->admin_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('lock',$this->lock);
		$criteria->compare('last_logintime',$this->last_logintime,true);
		$criteria->compare('email',$this->email);
		$criteria->compare('send_email',$this->send_email);
				
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function  judge($usr, $psw)
	{
		 $model = Admin::model() -> findByAttributes(array('username' => $usr));
		 if( !isset($model -> username) || empty($model -> username) ) $this -> addError('old_username', '用户名或密码错误');  
		 else if( $model -> password != $psw) $this -> addError('old_username', '用户名或密码错误'); 
		 else {
		 	return true;
		 }
		 return false;
	}

}








