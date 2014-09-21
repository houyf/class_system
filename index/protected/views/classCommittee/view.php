<?php
/* @var $this ClassCommitteeController */
/* @var $model ClassCommittee */

$this->breadcrumbs=array(
	'Class Committees'=>array('index'),
	$model->position_id,
);

$this->menu=array(
	array('label'=>'List ClassCommittee', 'url'=>array('index')),
	array('label'=>'Create ClassCommittee', 'url'=>array('create')),
	array('label'=>'Update ClassCommittee', 'url'=>array('update', 'id'=>$model->position_id)),
	array('label'=>'Delete ClassCommittee', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->position_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClassCommittee', 'url'=>array('admin')),
);
?>

<h1>View ClassCommittee #<?php echo $model->position_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'position_id',
		'position_name',
		'position_info',
		'start_time',
		'winner_id',
		'class_id',
	),
)); ?>
