<?php
 $this->breadcrumbs=array(
	'Campus Areas'=>array('index'),
	$model->area_id,
);

$this->menu=array(
	array('label'=>'List CampusArea', 'url'=>array('index')),
	array('label'=>'Create CampusArea', 'url'=>array('create')),
	array('label'=>'Update CampusArea', 'url'=>array('update', 'id'=>$model->area_id)),
	array('label'=>'Delete CampusArea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->area_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CampusArea', 'url'=>array('admin')),
);
?>

<h1> <?php echo $model->area_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'area_id',
		'area_name',
	),
)); ?>
