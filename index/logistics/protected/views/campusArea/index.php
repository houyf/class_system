<?php
/* @var $this CampusAreaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Campus Areas',
);

$this->menu=array(
	array('label'=>'Create CampusArea', 'url'=>array('create')),
	array('label'=>'Manage CampusArea', 'url'=>array('admin')),
);
?>

<h1>Campus Areas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
