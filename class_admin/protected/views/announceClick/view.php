<?php
/* @var $this AnnounceClickController */
/* @var $model AnnounceClick */

$this->breadcrumbs=array(
	'Announce Clicks'=>array('index'),
	$model->click_id,
);

$this->menu=array(
	array('label'=>'List AnnounceClick', 'url'=>array('index')),
	array('label'=>'Create AnnounceClick', 'url'=>array('create')),
	array('label'=>'Update AnnounceClick', 'url'=>array('update', 'id'=>$model->click_id)),
	array('label'=>'Delete AnnounceClick', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->click_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AnnounceClick', 'url'=>array('admin')),
);
?>

<h1>View AnnounceClick #<?php echo $model->click_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'click_id',
		'student_id',
		'announce_id',
	),
)); ?>
