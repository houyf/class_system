<?php

/**
 * This is the model class for table "competitor".
 *
 * The followings are the available columns in table 'competitor':
 * @property string $competitor_id
 * @property string $position_id
 * @property integer $votes
 *
 * The followings are the available model relations:
 * @property ClassCommittee $position
 */
class Competitor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Competitor the static model class
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
		return 'competitor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('competitor_id, position_id', 'required'),
			array('votes', 'numerical', 'integerOnly'=>true),
			array('competitor_id, position_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('competitor_id, position_id, votes', 'safe', 'on'=>'search'),
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
			'position' => array(self::BELONGS_TO, 'ClassCommittee', 'position_id'),
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'competitor_id' => 'Competitor',
			'position_id' => 'Position',
			'votes' => 'Votes',
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

		$criteria->compare('competitor_id',$this->competitor_id,true);
		$criteria->compare('position_id',$this->position_id,true);
		$criteria->compare('votes',$this->votes);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	static function categoryOptions()
	{
		$criteria = new CDbCriteria;
		$criteria -> select = 'cate_id, cate_name';
		$criteria -> addCondition('class_id=' . Yii::app() -> user->class_id );
	 	$model  = AnnounceCategory::model() -> findAll($criteria);		 	 
	 	$cates = array('' => '请选择公告类别');
	 	foreach ($model as $row) {
	 		 $cates[$row -> cate_id] = $row ->cate_name;
	 	}
	 	return $cates;
	}
 
	static function  CompetitorOptions($position_id)
	{
		$competitors = ClassCommittee::model() -> findByPk($position_id) -> competitors;
	 	$results   = array('0' => '请选择竞争者');
	 	foreach ($competitors as $row) {
	 		 $results[$row -> competitor_id] =  Student::model() -> findByPk($row -> competitor_id) -> student_name;
	 	}
	 	return $results;
	}

}