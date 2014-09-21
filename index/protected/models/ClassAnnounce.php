<?php

class ClassAnnounce extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ClassAnnounce the static model class
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
		return 'class_announce';
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
			array('cate_id, start_time, deadline, level, announce_content, title', 'required'),
			array('cate_id, level', 'length', 'max'=>10),
			array('title', 'length' , 'max' => 200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('announce_id, cate_id, start_time, deadline, level, announce_content, is_pub, is_delete, class_id, title', 'safe', 'on'=>'search'),
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
			'cate' => array(self::BELONGS_TO, 'AnnounceCategory', 'cate_id'),
			'clicks' => array(self::HAS_MANY, 'AnnounceClick', 'announce_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{       
		return array(
			'announce_id' => '公告ID',
			'cate_id' => '公告类别',
			'start_time' => '发布日期',
			'deadline' => '有效日期',
			'level' => '公告重要性等级',
			'announce_content' => '公告内容',
			'is_delete' => '是否被删除',
			'is_pub' => '是否发布',
			'title' => '公告标题',
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

		$criteria->compare('announce_id',$this->announce_id,true);
		$criteria->compare('cate_id',$this->cate_id,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('deadline',$this->deadline,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('class_id',$this->class_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('announce_content',$this->announce_content,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}