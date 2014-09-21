<?php
/* @var $this AnnounceCategoryController */
/* @var $model AnnounceCategory */

$this->breadcrumbs=array(
	'Announce Categories'=>array('index'),
	$model->cate_id=>array('view','id'=>$model->cate_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnnounceCategory', 'url'=>array('index')),
	array('label'=>'Create AnnounceCategory', 'url'=>array('create')),
	array('label'=>'View AnnounceCategory', 'url'=>array('view', 'id'=>$model->cate_id)),
	array('label'=>'Manage AnnounceCategory', 'url'=>array('admin')),
);
?>

<h1>Update AnnounceCategory <?php echo $model->cate_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>