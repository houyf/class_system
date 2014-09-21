<?php

/**
 * This is the model class for table "major".
 *
 * The followings are the available columns in table 'major':
 * @property string $major_id
 * @property string $major_name
 * @property string $major_create_time
 * @property string $major_info
 * @property string $department_id
 *
 * The followings are the available model relations:
 * @property Department $department
 * @property Student[] $students
 */
class Major extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Major the static model class
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
		return 'major';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('major_name, major_create_time, major_info, department_id', 'required'),
			array('major_name', 'length', 'max'=>50),
			array('department_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('major_id, major_name, major_create_time, major_info, department_id', 'safe', 'on'=>'search'),
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
			'department' => array(self::BELONGS_TO, 'Department', 'department_id'),
			'students' => array(self::HAS_MANY, 'Student', 'major_id'),
			'classes' => array(self::HAS_MANY, 'Classroom', 'major_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{   
		return array(
			'major_id' => '专业ID',
			'major_name' => '专业名称 ',
			'major_create_time' => '专业创建时间',
			'major_info' => '专业概况',
			'department_id' => '专业所属院系',
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

		$criteria->compare('major_id',$this->major_id,true);
		$criteria->compare('major_name',$this->major_name,true);
		$criteria->compare('major_create_time',$this->major_create_time,true);
		$criteria->compare('major_info',$this->major_info,true);
		$criteria->compare('department_id',$this->department_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	static function majorOptions()
	{
		$criteria = new CDbCriteria;
		$criteria -> select = 'major_id, major_name';
	 	$model  = Major::model() -> findAll();	
	 	 
	 	return CHtml::ListData($model, 'major_id', 'major_name');
	}
}