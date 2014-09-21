<?php
/* @var $this ClassAdminController */
/* @var $model ClassAdmin */

$this->breadcrumbs=array(
	'Class Admins'=>array('index'),
	$model->class_admin_id,
);

$this->menu=array(
	array('label'=>'List ClassAdmin', 'url'=>array('index')),
	array('label'=>'Create ClassAdmin', 'url'=>array('create')),
	array('label'=>'Update ClassAdmin', 'url'=>array('update', 'id'=>$model->class_admin_id)),
	array('label'=>'Delete ClassAdmin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->class_admin_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClassAdmin', 'url'=>array('admin')),
);
?>

<h1>View ClassAdmin #<?php echo $model->class_admin_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'class_admin_id',
		'student_id',
		'login_name',
		'student_psw',
		'level',
	),
)); ?>
