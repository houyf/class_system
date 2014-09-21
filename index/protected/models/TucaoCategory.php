<?php

/**
 * This is the model class for table "tucao_category".
 *
 * The followings are the available columns in table 'tucao_category':
 * @property string $tucao_cate_id
 * @property string $tucao_cate_name
 * @property string $class_id
 *
 * The followings are the available model relations:
 * @property Tucao[] $tucaos
 * @property Class $class
 */
class TucaoCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TucaoCategory the static model class
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
		return 'tucao_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */

	protected function beforeSave()
	{
		if(! parent::beforeSave()) return false;
		if($this->isNewRecord)
			 $this -> class_id = Yii::app() -> user-> class_id;
		return true;

	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tucao_cate_name', 'required'),
			array('tucao_cate_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tucao_cate_id, tucao_cate_name, class_id', 'safe', 'on'=>'search'),
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
			'tucaos' => array(self::HAS_MANY, 'Tucao', 'tucao_cate_id'),
			'class' => array(self::BELONGS_TO, 'Class', 'class_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tucao_cate_id' => 'Tucao Cate',
			'tucao_cate_name' => 'Tucao Cate Name',
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

		$criteria->compare('tucao_cate_id',$this->tucao_cate_id,true);
		$criteria->compare('tucao_cate_name',$this->tucao_cate_name,true);
		$criteria->compare('class_id',$this->class_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	static function categoryOptions()
	{
		$criteria = new CDbCriteria;
		$criteria -> select = 'tucao_cate_id, tucao_cate_name';
	 	$model  = TucaoCategory::model() -> findAll();		 	 
	 	$cates = array('' => '请选择吐槽类型');
	 	foreach ($model as $row) {
	 		 $cates[$row -> tucao_cate_id] = $row ->tucao_cate_name;
	 	}
	 	return $cates;
	}
}