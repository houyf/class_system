<?php
/* @var $this CampusAreaController */
/* @var $model CampusArea */

$this->breadcrumbs=array(
	'Campus Areas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CampusArea', 'url'=>array('index')),
	array('label'=>'Manage CampusArea', 'url'=>array('admin')),
);
?>

<h1>添加园区</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>