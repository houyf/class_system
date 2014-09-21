<?php

/**
 * This is the model class for table "building".
 *
 * The followings are the available columns in table 'building':
 * @property string $building_id
 * @property string $area_id
 *
 * The followings are the available model relations:
 * @property CampusArea $area
 * @property Dorm[] $dorms
 */
class Building extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Building the static model class
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
		return 'building';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('area_id, building_id', 'required'),
			array('building_id', 'numerical', 'integerOnly'=>true), 
			array('area_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('building_id, area_id', 'safe', 'on'=>'search'),
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
			'area' => array(self::BELONGS_TO, 'CampusArea', 'area_id'),
			'dorms' => array(self::HAS_MANY, 'Dorm', 'building_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{ 
		return array(
			'building_id' => '楼号',
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

		$criteria->compare('building_id',$this->building_id,true);
		$criteria->compare('area_id',$this->area_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	static function buildingOptions(  )
	{
		$criteria = new CDbCriteria;
		$criteria -> select = 'building_id';
	 	$model  = Building::model() -> findAll();		 	 
	 	$buildings = array('' => '请选择相应楼栋');
	 	foreach ($model as $row) {
	 		 $buildings[$row -> building_id] = $row -> building_id . '号' ;
	 	}
	 	return $buildings;
	}
}