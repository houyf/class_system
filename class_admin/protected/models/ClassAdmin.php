<?php

/**
 * This is the model class for table "class_admin".
 *
 * The followings are the available columns in table 'class_admin':
 * @property string $class_admin_id
 * @property string $student_id
 * @property string $login_name
 * @property string $student_psw
 * @property string $level
 *
 * The followings are the available model relations:
 * @property Student $student
 */
class ClassAdmin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ClassAdmin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'class_admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_id, login_name, student_psw', 'required'),
			array('student_id, level', 'length', 'max'=>10),
			array('login_name, student_psw', 'length', 'max'=>100),
			array('class_admin_id, student_id, login_name, student_psw, level', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'class_admin_id' => '班级管理员ID',
			'student_id' => '学号',  
			'login_name' => '用户名',
			'student_psw' => '密码',
			'level' => '管理员等级',
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

		$criteria->compare('class_admin_id',$this->class_admin_id,true);
		$criteria->compare('student_id',$this->student_id,true);
		$criteria->compare('login_name',$this->login_name,true);
		$criteria->compare('student_psw',$this->student_psw,true);
		$criteria->compare('level',$this->level,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}