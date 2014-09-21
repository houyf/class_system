<?php
/* @var $this ClassAdminController */
/* @var $model ClassAdmin */

$this->breadcrumbs=array(
	'Class Admins'=>array('index'),
	$model->class_admin_id=>array('view','id'=>$model->class_admin_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClassAdmin', 'url'=>array('index')),
	array('label'=>'Create ClassAdmin', 'url'=>array('create')),
	array('label'=>'View ClassAdmin', 'url'=>array('view', 'id'=>$model->class_admin_id)),
	array('label'=>'Manage ClassAdmin', 'url'=>array('admin')),
);
?>

<h1>Update ClassAdmin <?php echo $model->class_admin_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>