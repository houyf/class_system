<?php
/* @var $this ClassroomController */
/* @var $model Classroom */

$this->breadcrumbs=array(
	'Classrooms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Classroom', 'url'=>array('index')),
	array('label'=>'Manage Classroom', 'url'=>array('admin')),
);
?>

<h1>添加班级</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>