<?php
/* @var $this ClassroomController */
/* @var $model Classroom */

$this->breadcrumbs=array(
	'Classrooms'=>array('index'),
	$model->class_id=>array('view','id'=>$model->class_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Classroom', 'url'=>array('index')),
	array('label'=>'Create Classroom', 'url'=>array('create')),
	array('label'=>'View Classroom', 'url'=>array('view', 'id'=>$model->class_id)),
	array('label'=>'Manage Classroom', 'url'=>array('admin')),
);
?>

<h1>Update Classroom <?php echo $model->class_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>