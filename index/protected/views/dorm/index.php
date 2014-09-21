<?php
/* @var $this DormController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dorms',
);

$this->menu=array(
	array('label'=>'Create Dorm', 'url'=>array('create')),
	array('label'=>'Manage Dorm', 'url'=>array('admin')),
);
?>

<h1>Dorms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
