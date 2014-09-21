<?php
/* @var $this TucaoCategoryController */
/* @var $model TucaoCategory */

$this->breadcrumbs=array(
	'Tucao Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TucaoCategory', 'url'=>array('index')),
	array('label'=>'Manage TucaoCategory', 'url'=>array('admin')),
);
?>

<h1>Create TucaoCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>