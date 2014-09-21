<?php
/* @var $this AnnounceCategoryController */
/* @var $model AnnounceCategory */

$this->breadcrumbs=array(
	'Announce Categories'=>array('index'),
	$model->cate_id,
);

$this->menu=array(
	array('label'=>'List AnnounceCategory', 'url'=>array('index')),
	array('label'=>'Create AnnounceCategory', 'url'=>array('create')),
	array('label'=>'Update AnnounceCategory', 'url'=>array('update', 'id'=>$model->cate_id)),
	array('label'=>'Delete AnnounceCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cate_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AnnounceCategory', 'url'=>array('admin')),
);
?>

<h1>View AnnounceCategory #<?php echo $model->cate_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cate_id',
		'cate_name',
		'class_id'
	),
)); ?>
