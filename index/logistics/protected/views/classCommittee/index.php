<?php
/* @var $this ClassCommitteeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Class Committees',
);

$this->menu=array(
	array('label'=>'Create ClassCommittee', 'url'=>array('create')),
	array('label'=>'Manage ClassCommittee', 'url'=>array('admin')),
);
?>

<h1>Class Committees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
