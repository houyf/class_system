<?php
/* @var $this MajorController */
/* @var $model Major */

$this->breadcrumbs=array(
	'Majors'=>array('index'),
	$model->major_id,
);

$this->menu=array(
	array('label'=>'List Major', 'url'=>array('index')),
	array('label'=>'Create Major', 'url'=>array('create')),
	array('label'=>'Update Major', 'url'=>array('update', 'id'=>$model->major_id)),
	array('label'=>'Delete Major', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->major_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Major', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->major_name; ?> 相关信息 </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'major_id',
		'major_name',
		'major_create_time',
		'major_info',
		array('name' => 'department_id', 'value' => $model->department->department_name)
	),
)); ?>




