<?php
/* @var $this TucaoCategoryController */
/* @var $model TucaoCategory */

$this->breadcrumbs=array(
	'Tucao Categories'=>array('index'),
	$model->tucao_cate_id=>array('view','id'=>$model->tucao_cate_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TucaoCategory', 'url'=>array('index')),
	array('label'=>'Create TucaoCategory', 'url'=>array('create')),
	array('label'=>'View TucaoCategory', 'url'=>array('view', 'id'=>$model->tucao_cate_id)),
	array('label'=>'Manage TucaoCategory', 'url'=>array('admin')),
);
?>

<h1>Update TucaoCategory <?php echo $model->tucao_cate_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>