<?php
/* @var $this AdviceController */
/* @var $model Advice */

$this->breadcrumbs=array(
	'Advices'=>array('index'),
	$model->aid,
);

$this->menu=array(
	array('label'=>'List Advice', 'url'=>array('index')),
	array('label'=>'Create Advice', 'url'=>array('create')),
	array('label'=>'Update Advice', 'url'=>array('update', 'id'=>$model->aid)),
	array('label'=>'Delete Advice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->aid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Advice', 'url'=>array('admin')),
);
?>

<h1>View Advice #<?php echo $model->aid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'aid',
		'cid',
		'user_id',
		'content',
		'status',
		'picture',
		'create_time',
	),
)); ?>
