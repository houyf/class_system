<?php
/* @var $this DormController */
/* @var $model Dorm */

$this->breadcrumbs=array(
	'Dorms'=>array('index'),
	$model->dorm_id,
);

$this->menu=array(
	array('label'=>'List Dorm', 'url'=>array('index')),
	array('label'=>'Create Dorm', 'url'=>array('create')),
	array('label'=>'Update Dorm', 'url'=>array('update', 'id'=>$model->dorm_id)),
	array('label'=>'Delete Dorm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->dorm_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dorm', 'url'=>array('admin')),
);
?>

<h1> <?php echo $model->dorm_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'dorm_id',
		'dorm_name',
		'building_id',
	),
)); ?>
