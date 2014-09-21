<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property string $student_id
 * @property string $student_name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $dorm_id
 * @property string $birthday
 * @property string $student_info
 * @property string $login_name
 * @property string $login_psw
 * @property string $class_id
 * @property string $major_id
 *
 * The followings are the available model relations:
 * @property ClassAdmin[] $classAdmins
 * @property Resources[] $resources
 * @property Major $major
 * @property Class $class
 * @property Dorm $dorm
 * @property Tucao[] $tucaos
 */
class Student extends CActiveRecord
{

	public $area_id;
	public $building_id;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
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
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// dorm_id
			array('student_id, student_name, address, phone, email,birthday, student_info, login_name, login_psw, class_id, major_id', 'required'),
			array('student_id, dorm_id, class_id, major_id', 'length', 'max'=>10),
			array('student_name', 'length', 'max'=>50),
			array('address', 'length', 'max'=>200),
			array('phone', 'length', 'max'=>20),
			array('email, login_name, login_psw', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_id, student_name, address, phone, email, dorm_id, birthday, student_info, login_name, login_psw, class_id, major_id', 'safe', 'on'=>'search'),
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
			'classAdmins' => array(self::HAS_MANY, 'ClassAdmin', 'student_id'),
			'resources' => array(self::HAS_MANY, 'Resources', 'volunteer_id'),
			'major' => array(self::BELONGS_TO, 'Major', 'major_id'),
			'classroom' => array(self::BELONGS_TO, 'Classroom', 'class_id'),
			'dorm' => array(self::BELONGS_TO, 'Dorm', 'dorm_id'),
			'tucaos' => array(self::HAS_MANY, 'Tucao', 'student_id'),
			'announce_click' => array(self::HAS_MANY, 'AnnounceClick', 'student_id'),
			'competitors' => array(self::HAS_MANY, 'Competitor', 'competitor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{           
		return array(
			'student_id' => '学号',
			'student_name' => '姓名',
			'address' => '家庭住址',
			'phone' => '手机号',
			'email' => '邮箱',
			'dorm_id' => '宿舍',
			'birthday' => '生日',
			'student_info' => '个人基本信息',
			'login_name' => '登录用户名 ',
			'login_psw' => '登录密码',
			'class_id' => '班级',
			'major_id' => '专业',
			'area_id' => '园区',
			'building_id' => '楼栋',  
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

		$criteria->compare('student_id',$this->student_id,true);
		$criteria->compare('student_name',$this->student_name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('dorm_id',$this->dorm_id,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('student_info',$this->student_info,true);
		$criteria->compare('login_name',$this->login_name,true);
		$criteria->compare('login_psw',$this->login_psw,true);
		$criteria->compare('class_id',$this->class_id,true);
		$criteria->compare('major_id',$this->major_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}