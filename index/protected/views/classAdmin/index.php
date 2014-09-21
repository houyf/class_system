<?php
/* @var $this ClassAdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Class Admins',
);

$this->menu=array(
	array('label'=>'Create ClassAdmin', 'url'=>array('create')),
	array('label'=>'Manage ClassAdmin', 'url'=>array('admin')),
);
?>

<h1>Class Admins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
