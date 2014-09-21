<?php
/* @var $this TucaoController */
/* @var $data Tucao */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tucao_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tucao_id), array('view', 'id'=>$data->tucao_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tucao_cate_id')); ?>:</b>
	<?php echo CHtml::encode($data->tucao_cate_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tucao_time')); ?>:</b>
	<?php echo CHtml::encode($data->tucao_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('support')); ?>:</b>
	<?php echo CHtml::encode($data->support); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oppose')); ?>:</b>
	<?php echo CHtml::encode($data->oppose); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('huifu')); ?>:</b>
	<?php echo CHtml::encode($data->huifu); ?>
	<br />

	*/ ?>

</div>