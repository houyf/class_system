<?php
/* @var $this TucaoController */
/* @var $model Tucao */

$this->breadcrumbs=array(
	'Tucaos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tucao', 'url'=>array('index')),
	array('label'=>'Manage Tucao', 'url'=>array('admin')),
);
?>

<h1>Create Tucao</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>