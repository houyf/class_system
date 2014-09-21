<?php
/* @var $this ClassAnnounceController */
/* @var $model ClassAnnounce */

$this->breadcrumbs=array(
	'Class Announces'=>array('index'),
	$model->announce_id=>array('view','id'=>$model->announce_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClassAnnounce', 'url'=>array('index')),
	array('label'=>'Create ClassAnnounce', 'url'=>array('create')),
	array('label'=>'View ClassAnnounce', 'url'=>array('view', 'id'=>$model->announce_id)),
	array('label'=>'Manage ClassAnnounce', 'url'=>array('admin')),
);
?>

<h1>Update ClassAnnounce <?php echo $model->announce_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>