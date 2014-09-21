<?php
/* @var $this TucaoController */
/* @var $model Tucao */

$this->breadcrumbs=array(
	'Tucaos'=>array('index'),
	$model->tucao_id,
);

$this->menu=array(
	array('label'=>'List Tucao', 'url'=>array('index')),
	array('label'=>'Create Tucao', 'url'=>array('create')),
	array('label'=>'Update Tucao', 'url'=>array('update', 'id'=>$model->tucao_id)),
	array('label'=>'Delete Tucao', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tucao_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tucao', 'url'=>array('admin')),
);
?>

<h1>View Tucao #<?php echo $model->tucao_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tucao_id',
		'tucao_cate_id',
		'student_id',
		'tucao_time',
		'content',
		'support',
		'oppose',
		'huifu',
	),
)); ?>
