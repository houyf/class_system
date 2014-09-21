<?php

/**
 * This is the model class for table "announce_category".
 *
 * The followings are the available columns in table 'announce_category':
 * @property string $cate_id
 * @property string $cate_name
 * @property string $class_id
 *
 * The followings are the available model relations:
 * @property Class $class
 * @property ClassAnnounce[] $classAnnounces
 */
class AnnounceCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AnnounceCategory the static model class
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
		return 'announce_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	protected function beforeSave()
	{
		if(! parent::beforeSave()) return false;
		if($this->isNewRecord)
			 $this -> class_id = Yii::app() -> user-> class_id;
		else 
			return false;
		return true;

	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cate_name', 'required'),
			array('cate_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cate_id, cate_name, class_id', 'safe', 'on'=>'search'),
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
			'class' => array(self::BELONGS_TO, 'Class', 'class_id'),
			'classAnnounces' => array(self::HAS_MANY, 'ClassAnnounce', 'cate_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cate_id' => 'Cate',
			'cate_name' => 'Cate Name',
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

		$criteria->compare('cate_id',$this->cate_id,true);
		$criteria->compare('cate_name',$this->cate_name,true);
		$criteria->compare('class_id',$this->class_id,true);
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
	
}