<?php
/* @var $this AnnounceCategoryController */
/* @var $data AnnounceCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cate_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cate_id), array('view', 'id'=>$data->cate_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cate_name')); ?>:</b>
	<?php echo CHtml::encode($data->cate_name); ?>
	<br />


</div>