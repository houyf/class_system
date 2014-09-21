<?php
/* @var $this TucaoCategoryController */
/* @var $model TucaoCategory */

$this->breadcrumbs=array(
	'Tucao Categories'=>array('index'),
	$model->tucao_cate_id,
);

$this->menu=array(
	array('label'=>'List TucaoCategory', 'url'=>array('index')),
	array('label'=>'Create TucaoCategory', 'url'=>array('create')),
	array('label'=>'Update TucaoCategory', 'url'=>array('update', 'id'=>$model->tucao_cate_id)),
	array('label'=>'Delete TucaoCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tucao_cate_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TucaoCategory', 'url'=>array('admin')),
);
?>

<h1>View TucaoCategory #<?php echo $model->tucao_cate_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tucao_cate_id',
		'tucao_cate_name',
		'class_id',
	),
)); ?>
