<?php

class Department extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Department the static model class
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
		return 'department';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('department_name, department_create_time', 'required'),
			array('department_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('department_id, department_name, department_create_time, department_info', 'safe' ),
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
			'majors' => array(self::HAS_MANY, 'Major', 'department_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(  
			'department_id' => '院系ID',
			'department_name' => '院系名称',
			'department_create_time' => '院系创建时间',
			'department_info' => '院系概况',
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

		$criteria->compare('department_id',$this->department_id,true);
		$criteria->compare('department_name',$this->department_name,true);
		$criteria->compare('department_create_time',$this->department_create_time,true);
		$criteria->compare('department_info',$this->department_info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	static function departmentOptions()
	{
		$criteria = new CDbCriteria;
		$criteria -> select = 'department_id, department_name';
	 	$model  = Department::model() -> findAll();		 	 
	 	$departments = array('' => '请选择相应院系');
	 	foreach ($model as $row) {
	 		 $departments[$row -> department_id] = $row -> department_name;
	 	}
	 	return $departments;
	}
}