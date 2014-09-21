<?php 
Yii::app()->clientScript->registerCss('class1', "
 .align_center{text-align:center;}
");
?>
<h1 class = 'align_center'>公告基本信息</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'announce_content',
		'cate_id',
		array('name' => 'cate_id', 'value' => $model -> cate -> cate_name),
		'start_time',
		'deadline',
		array('name' => 'level', 'value' => $model -> level . '颗星'),
	),
)); ?>


