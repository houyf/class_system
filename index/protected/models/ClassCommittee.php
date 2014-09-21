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

	protected function beforeSave()
	{
		if(! parent::beforeSave()) return false;
		if($this->isNewRecord) {
			 $this -> class_id = Yii::app() -> user-> class_id;
			 $this -> start_time = date('Y-m-d  H:i:s',time());
		}
		return true;

	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		return array(
			array('position_name, position_info', 'required'),
			array('picture', 'save'),
			array('class_id', 'length', 'max'=>10),
			array('position_name', 'length', 'max'=>100),
			array('position_id, position_name, position_info, start_time, winner_id, class_id, picture', 'safe', 'on'=>'search'),
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
			'position_id' => '职位ID',
			'position_name' => '职位名称',
			'position_info' => '角色基本信息',
			'start_time' => '开始时间',
			'winner_id' => '任职学生',
			'class_id' => '班级',
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
		$criteria->compare('picture',$this->picture,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}