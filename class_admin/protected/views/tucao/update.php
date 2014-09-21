<?php
/* @var $this TucaoController */
/* @var $model Tucao */

$this->breadcrumbs=array(
	'Tucaos'=>array('index'),
	$model->tucao_id=>array('view','id'=>$model->tucao_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tucao', 'url'=>array('index')),
	array('label'=>'Create Tucao', 'url'=>array('create')),
	array('label'=>'View Tucao', 'url'=>array('view', 'id'=>$model->tucao_id)),
	array('label'=>'Manage Tucao', 'url'=>array('admin')),
);
?>

<h1>Update Tucao <?php echo $model->tucao_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>