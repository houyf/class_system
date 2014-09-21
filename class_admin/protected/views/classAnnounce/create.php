<?php
/* @var $this ClassAnnounceController */
/* @var $model ClassAnnounce */

$this->breadcrumbs=array(
	'Class Announces'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClassAnnounce', 'url'=>array('index')),
	array('label'=>'Manage ClassAnnounce', 'url'=>array('admin')),
);
?>

<h1>Create ClassAnnounce</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>