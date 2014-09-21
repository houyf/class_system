<?php

class Advice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Advice the static model class
	 */

	public $verifyCode;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'advice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('cid, user_id, content, create_time,can_announce,good, bad, read', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('cid, user_id', 'length', 'max'=>20),
			array('picture', 'length', 'max'=>1000),
			array('aid, cid, user_id, content, status, picture, create_time,can_announce, good, bad, read', 'safe', 'on'=>'search'),
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'message' => '验证码不正确'),
			// 验证码有点小问题
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
			'c' => array(self::BELONGS_TO, 'Category', 'cid'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'aid' => 'ID',
			'cid' => '选择类别',
			'user_id' => '联系人',
			'content' => '具体内容',
			'status' => '是否已读',
			'picture' => '上传图片',
			'create_time' => '上传时间',
			'verifyCode' => '验证码',
			'can_announce' => '是否允许发布',
			'good' =>  '支持人数',
			'bad' =>  '反对人数',
			'read' =>  '阅读数',
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

		$criteria->compare('aid',$this->aid,true);
		$criteria->compare('cid',$this->cid,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('good',$this->good,true);
		$criteria->compare('bad',$this->bad,true);
		$criteria->compare('read',$this->read,true);
		$criteria->compare('can_announce',$this->can_announce,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}