<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->student_id,
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'Update Student', 'url'=>array('update', 'id'=>$model->student_id)),
	array('label'=>'Delete Student', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1> 学生个人信息 </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'student_id',
		'student_name',
		'address',
		'phone',
		'email',
		array('name' => 'dorm_id' , 'value' => $model->dorm->dorm_name),
		'birthday',
		'student_info',
		'login_name',
		'login_psw',
		array('name' => 'class_id' , 'value' => $model->classroom->class_name),
		array('name' => 'major_id' , 'value' => $model->major->major_name),
	),
)); ?>
