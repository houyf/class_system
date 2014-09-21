<?php
/* @var $this BuildingController */
/* @var $model Building */

$this->breadcrumbs=array(
	'Buildings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Building', 'url'=>array('index')),
	array('label'=>'Manage Building', 'url'=>array('admin')),
);
?>

<h1>添加宿舍楼</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>