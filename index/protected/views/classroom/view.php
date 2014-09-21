<?php
 $this->breadcrumbs=array(
	'Classrooms'=>array('index'),
	$model->class_id,
);

$this->menu=array(
	array('label'=>'List Classroom', 'url'=>array('index')),
	array('label'=>'Create Classroom', 'url'=>array('create')),
	array('label'=>'Update Classroom', 'url'=>array('update', 'id'=>$model->class_id)),
	array('label'=>'Delete Classroom', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->class_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Classroom', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->class_name; ?> 基本信息</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'class_id',
		'class_name',
		'class_info',
		'class_create_time',
		array('name' => 'major_id' , 'value' => $model -> major -> major_name)
	),
)); ?>
