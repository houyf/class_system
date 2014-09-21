<?php

/**
 * This is the model class for table "campus_area".
 *
 * The followings are the available columns in table 'campus_area':
 * @property string $area_id
 * @property string $area_name
 *
 * The followings are the available model relations:
 * @property Building[] $buildings
 */
class CampusArea extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CampusArea the static model class
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
		return 'campus_area';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('area_name', 'required'),
			array('area_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('area_id, area_name', 'safe', 'on'=>'search'),
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
			'buildings' => array(self::HAS_MANY, 'Building', 'area_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'area_id' => '园区ID',
			'area_name' => '园区名字',
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

		$criteria->compare('area_id',$this->area_id,true);
		$criteria->compare('area_name',$this->area_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	static function campus_areaOptions()
	{
		$criteria = new CDbCriteria;
		$criteria -> select = 'area_id, area_name';
	 	$model  = CampusArea::model() -> findAll();		 	 
	 	$campus_areas = array('' => '请选择相应园区');
	 	foreach ($model as $row) {
	 		 $campus_areas[$row -> area_id] = $row -> area_name;
	 	}
	 	return $campus_areas;
	}
}





