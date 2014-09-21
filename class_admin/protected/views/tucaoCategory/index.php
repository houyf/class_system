<?php
/* @var $this TucaoCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tucao Categories',
);

$this->menu=array(
	array('label'=>'Create TucaoCategory', 'url'=>array('create')),
	array('label'=>'Manage TucaoCategory', 'url'=>array('admin')),
);
?>

<h1>Tucao Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
