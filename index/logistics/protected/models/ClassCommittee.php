<?php

/**
 * This is the model class for table "class_committee".
 *
 * The followings are the available columns in table 'class_committee':
 * @property string $position_id
 * @property string $position_name
 * @property string $position_info
 * @property string $start_time
 * @property string $winner_id
 * @property string $class_id
 *
 * The followings are the available model relations:
 * @property Competitor[] $competitors
 */
class ClassCommittee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ClassCommittee the static model class
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
		return 'class_committee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		return array(
			array('position_name, position_info, start_time, class_id', 'required'),
			array('class_id', 'length', 'max'=>10),
			array('position_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('position_id, position_name, position_info, start_time, winner_id, class_id', 'safe', 'on'=>'search'),
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
			'competitors' => array(self::HAS_MANY, 'Competitor', 'position_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'position_id' => 'Position',
			'position_name' => 'Position Name',
			'position_info' => 'Position Info',
			'start_time' => 'Start Time',
			'winner_id' => 'Winner',
			'class_id' => 'Class',
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

		$criteria->compare('position_id',$this->position_id,true);
		$criteria->compare('position_name',$this->position_name,true);
		$criteria->compare('position_info',$this->position_info,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('winner_id',$this->winner_id,true);
		$criteria->compare('class_id',$this->class_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}