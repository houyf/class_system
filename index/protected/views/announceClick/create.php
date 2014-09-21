<?php
/* @var $this AnnounceClickController */
/* @var $model AnnounceClick */

$this->breadcrumbs=array(
	'Announce Clicks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnnounceClick', 'url'=>array('index')),
	array('label'=>'Manage AnnounceClick', 'url'=>array('admin')),
);
?>

<h1>Create AnnounceClick</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>