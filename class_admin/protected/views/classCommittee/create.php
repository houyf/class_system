<?php
/* @var $this ClassCommitteeController */
/* @var $model ClassCommittee */

$this->breadcrumbs=array(
	'Class Committees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClassCommittee', 'url'=>array('index')),
	array('label'=>'Manage ClassCommittee', 'url'=>array('admin')),
);
?>

<h1>Create ClassCommittee</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>