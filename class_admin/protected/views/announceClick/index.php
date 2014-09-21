<?php
/* @var $this AnnounceClickController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Announce Clicks',
);

$this->menu=array(
	array('label'=>'Create AnnounceClick', 'url'=>array('create')),
	array('label'=>'Manage AnnounceClick', 'url'=>array('admin')),
);
?>

<h1>Announce Clicks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
