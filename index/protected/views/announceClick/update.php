<?php
/* @var $this AnnounceClickController */
/* @var $model AnnounceClick */

$this->breadcrumbs=array(
	'Announce Clicks'=>array('index'),
	$model->click_id=>array('view','id'=>$model->click_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnnounceClick', 'url'=>array('index')),
	array('label'=>'Create AnnounceClick', 'url'=>array('create')),
	array('label'=>'View AnnounceClick', 'url'=>array('view', 'id'=>$model->click_id)),
	array('label'=>'Manage AnnounceClick', 'url'=>array('admin')),
);
?>

<h1>Update AnnounceClick <?php echo $model->click_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>