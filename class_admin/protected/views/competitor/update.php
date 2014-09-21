<?php
/* @var $this CompetitorController */
/* @var $model Competitor */

$this->breadcrumbs=array(
	'Competitors'=>array('index'),
	$model->competitor_id=>array('view','id'=>$model->competitor_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Competitor', 'url'=>array('index')),
	array('label'=>'Create Competitor', 'url'=>array('create')),
	array('label'=>'View Competitor', 'url'=>array('view', 'id'=>$model->competitor_id)),
	array('label'=>'Manage Competitor', 'url'=>array('admin')),
);
?>

<h1>Update Competitor <?php echo $model->competitor_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>