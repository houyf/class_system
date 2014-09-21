<?php

/**
 * This is the model class for table "tucao".
 *
 * The followings are the available columns in table 'tucao':
 * @property string $tucao_id
 * @property string $tucao_cate_id
 * @property string $student_id
 * @property string $tucao_time
 * @property string $content
 * @property string $support
 * @property string $oppose
 * @property string $huifu
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property TucaoCategory $tucaoCate
 */
class Tucao extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tucao the static model class
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
		return 'tucao';
	}


	protected function beforeSave()
	{
		if(! parent::beforeSave()) return false;
		if($this->isNewRecord) {
			 $this ->tucao_time =  date('Y-m-d  H:i:s',time());
			$this -> student_id = Yii::app() -> user-> student_id;
		}
		return true;

	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tucao_cate_id, content, support, oppose ', 'required'),
			array('tucao_cate_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tucao_id, tucao_cate_id, student_id, tucao_time, content, support, oppose, huifu', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'tucaoCate' => array(self::BELONGS_TO, 'TucaoCategory', 'tucao_cate_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{    
		return array(
			'tucao_id' => '吐槽ID',
			'tucao_cate_id' => '吐槽类别',
			'student_id' => '吐槽的学生ID',
			'tucao_time' => '吐槽时间',
			'content' => '内容',  
			'support' => '赞的次数',
			'oppose' => '反对次数',
			'huifu' => '被回复者的ID',
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

		$criteria->compare('tucao_id',$this->tucao_id,true);
		$criteria->compare('tucao_cate_id',$this->tucao_cate_id,true);
		$criteria->compare('student_id',$this->student_id,true);
		$criteria->compare('tucao_time',$this->tucao_time,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('support',$this->support,true);
		$criteria->compare('oppose',$this->oppose,true);
		$criteria->compare('huifu',$this->huifu,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}