<?php
/* @var $this ClassAnnounceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Class Announces',
);

$this->menu=array(
	array('label'=>'Create ClassAnnounce', 'url'=>array('create')),
	array('label'=>'Manage ClassAnnounce', 'url'=>array('admin')),
);
?>

<h1>Class Announces</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
