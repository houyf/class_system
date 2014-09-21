<?php
/* @var $this CampusAreaController */
/* @var $model CampusArea */

$this->breadcrumbs=array(
	'Campus Areas'=>array('index'),
	$model->area_id=>array('view','id'=>$model->area_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CampusArea', 'url'=>array('index')),
	array('label'=>'Create CampusArea', 'url'=>array('create')),
	array('label'=>'View CampusArea', 'url'=>array('view', 'id'=>$model->area_id)),
	array('label'=>'Manage CampusArea', 'url'=>array('admin')),
);
?>

<h1>Update CampusArea <?php echo $model->area_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>