<?php

/**
 * This is the model class for table "class".
 *
 * The followings are the available columns in table 'class':
 * @property string $class_id
 * @property string $class_name
 * @property string $class_info
 * @property string $class_create_time
 * @property string $major_id
 *
 * The followings are the available model relations:
 * @property ResourcesCategory[] $resourcesCategories
 * @property Student[] $students
 * @property TucaoCategory[] $tucaoCategories
 */
class Classroom extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Classroom the static model class
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
		return 'class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_name, class_info, class_create_time, major_id', 'required'),
			array('class_name', 'length', 'max'=>50),
			array('major_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('class_id, class_name, class_info, class_create_time, major_id', 'safe', 'on'=>'search'),
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
			'resourcesCategories' => array(self::HAS_MANY, 'ResourcesCategory', 'class_id'),
			'students' => array(self::HAS_MANY, 'Student', 'class_id'),
			'tucaoCategories' => array(self::HAS_MANY, 'TucaoCategory', 'class_id'),
			'major' => array(self::BELONGS_TO, 'Major', 'major_id'), 
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'class_id' => '班级ID',
			'class_name' => '班级名称',
			'class_info' => '班级概况',
			'class_create_time' => '班级成立时间',
			'major_id' => '所属专业',
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

		$criteria->compare('class_id',$this->class_id,true);
		$criteria->compare('class_name',$this->class_name,true);
		$criteria->compare('class_info',$this->class_info,true);
		$criteria->compare('class_create_time',$this->class_create_time,true);
		$criteria->compare('major_id',$this->major_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}