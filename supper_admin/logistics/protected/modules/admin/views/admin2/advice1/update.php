<?php
/* @var $this AdviceController */
/* @var $model Advice */

$this->breadcrumbs=array(
	'Advices'=>array('index'),
	$model->aid=>array('view','id'=>$model->aid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Advice', 'url'=>array('index')),
	array('label'=>'Create Advice', 'url'=>array('create')),
	array('label'=>'View Advice', 'url'=>array('view', 'id'=>$model->aid)),
	array('label'=>'Manage Advice', 'url'=>array('admin')),
);
?>

<h1>Update Advice <?php echo $model->aid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>