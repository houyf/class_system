<?php
/* @var $this AdviceController */
/* @var $model Advice */

$this->breadcrumbs=array(
	'Advices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Advice', 'url'=>array('index')),
	array('label'=>'Manage Advice', 'url'=>array('admin')),
);
?>

<h1>Create Advice</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>