<?php
/* @var $this AdviceController */
/* @var $model Advice */

$this->breadcrumbs=array(
	'Advices'=>array('index'),
	$model->aid,
);

$this->menu=array(
	array('label'=>'List Advice', 'url'=>array('index')),
	array('label'=>'Create Advice', 'url'=>array('create')),
	array('label'=>'Update Advice', 'url'=>array('update', 'id'=>$model->aid)),
	array('label'=>'Delete Advice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->aid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Advice', 'url'=>array('admin')),
);
?>

<h1> 反馈建议 </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'aid',
		array('name'=> 'cid', 'value' => '$data -> c -> cname'),
		array('name'=> 'user_id', 'value' => '$data -> user -> username'),
		'content',
		array( 'label' => '是否已读' , 'name' => 'status'),
		'picture',
		'create_time',
	),
)); ?>
