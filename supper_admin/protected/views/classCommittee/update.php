<?php
/* @var $this ClassCommitteeController */
/* @var $model ClassCommittee */

$this->breadcrumbs=array(
	'Class Committees'=>array('index'),
	$model->position_id=>array('view','id'=>$model->position_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClassCommittee', 'url'=>array('index')),
	array('label'=>'Create ClassCommittee', 'url'=>array('create')),
	array('label'=>'View ClassCommittee', 'url'=>array('view', 'id'=>$model->position_id)),
	array('label'=>'Manage ClassCommittee', 'url'=>array('admin')),
);
?>

<h1>Update ClassCommittee <?php echo $model->position_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>