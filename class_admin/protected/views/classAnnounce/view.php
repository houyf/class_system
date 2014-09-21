<?php
/* @var $this ClassAnnounceController */
/* @var $model ClassAnnounce */

$this->breadcrumbs=array(
	'Class Announces'=>array('index'),
	$model->announce_id,
);

$this->menu=array(
	array('label'=>'List ClassAnnounce', 'url'=>array('index')),
	array('label'=>'Create ClassAnnounce', 'url'=>array('create')),
	array('label'=>'Update ClassAnnounce', 'url'=>array('update', 'id'=>$model->announce_id)),
	array('label'=>'Delete ClassAnnounce', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->announce_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClassAnnounce', 'url'=>array('admin')),
);
?>

<h1>View ClassAnnounce #<?php echo $model->announce_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'announce_id',
		'title',
		'announce_content',
		'cate_id',
		'start_time',
		'deadline',
		'level',
	),
)); ?>
