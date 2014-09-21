<?php
/* @var $this AnnounceCategoryController */
/* @var $model AnnounceCategory */

$this->breadcrumbs=array(
	'Announce Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnnounceCategory', 'url'=>array('index')),
	array('label'=>'Manage AnnounceCategory', 'url'=>array('admin')),
);
?>

<h1>Create AnnounceCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>