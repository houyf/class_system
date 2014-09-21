<?php
/* @var $this TucaoCategoryController */
/* @var $data TucaoCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tucao_cate_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tucao_cate_id), array('view', 'id'=>$data->tucao_cate_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tucao_cate_name')); ?>:</b>
	<?php echo CHtml::encode($data->tucao_cate_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
	<?php echo CHtml::encode($data->class_id); ?>
	<br />


</div>