<?php
/* @var $this ClassAdminController */
/* @var $model ClassAdmin */

$this->breadcrumbs=array(
	'Class Admins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClassAdmin', 'url'=>array('index')),
	array('label'=>'Manage ClassAdmin', 'url'=>array('admin')),
);
?>

<h1>Create ClassAdmin</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>