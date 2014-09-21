<?php
/* @var $this CompetitorController */
/* @var $model Competitor */

$this->breadcrumbs=array(
	'Competitors'=>array('index'),
	$model->competitor_id,
);

$this->menu=array(
	array('label'=>'List Competitor', 'url'=>array('index')),
	array('label'=>'Create Competitor', 'url'=>array('create')),
	array('label'=>'Update Competitor', 'url'=>array('update', 'id'=>$model->competitor_id)),
	array('label'=>'Delete Competitor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->competitor_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Competitor', 'url'=>array('admin')),
);
?>

<h1>View Competitor #<?php echo $model->competitor_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'competitor_id',
		'position_id',
		'votes',
	),
)); ?>
