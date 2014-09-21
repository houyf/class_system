<?php

/**
 * This is the model class for table "dorm".
 *
 * The followings are the available columns in table 'dorm':
 * @property string $dorm_id
 * @property string $dorm_name
 * @property string $building_id
 *
 * The followings are the available model relations:
 * @property Building $building
 * @property Student[] $students
 */
class Dorm extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dorm the static model class
	 */
	public $area_id;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dorm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dorm_name, building_id, dorm_id', 'required'),
			// array('area_id', 'required'),
			array('dorm_id', 'numerical', 'integerOnly'=> true),
			array('dorm_name', 'length', 'max'=>100),
			array('building_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('dorm_id, dorm_name, building_id', 'safe', 'on'=>'search'),
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
			'building' => array(self::BELONGS_TO, 'Building', 'building_id'),
			'students' => array(self::HAS_MANY, 'Student', 'dorm_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{  
		return array(
			'dorm_id' => '宿舍ID',
			'dorm_name' => '宿舍名号',
			'building_id' => '所属楼栋',
			'area_id' => '所属园区',
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

		$criteria->compare('dorm_id',$this->dorm_id,true);
		$criteria->compare('dorm_name',$this->dorm_name,true);
		$criteria->compare('building_id',$this->building_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}