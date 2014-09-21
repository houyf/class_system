<?php
/* @var $this AnnounceCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Announce Categories',
);

$this->menu=array(
	array('label'=>'Create AnnounceCategory', 'url'=>array('create')),
	array('label'=>'Manage AnnounceCategory', 'url'=>array('admin')),
);
?>

<h1>Announce Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
