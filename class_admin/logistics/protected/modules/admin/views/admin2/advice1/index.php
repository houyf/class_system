<?php
/* @var $this AdviceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Advices',
);

$this->menu=array(
	array('label'=>'Create Advice', 'url'=>array('create')),
	array('label'=>'Manage Advice', 'url'=>array('admin')),
);
?>

<h1>Advices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
