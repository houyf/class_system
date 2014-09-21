<?php
/* @var $this DormController */
/* @var $model Dorm */

$this->breadcrumbs=array(
	'Dorms'=>array('index'),
	$model->dorm_id=>array('view','id'=>$model->dorm_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dorm', 'url'=>array('index')),
	array('label'=>'Create Dorm', 'url'=>array('create')),
	array('label'=>'View Dorm', 'url'=>array('view', 'id'=>$model->dorm_id)),
	array('label'=>'Manage Dorm', 'url'=>array('admin')),
);
?>

<h1>Update Dorm <?php echo $model->dorm_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>