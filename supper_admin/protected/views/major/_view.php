<?php
/* @var $this MajorController */
/* @var $data Major */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('major_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->major_id), array('view', 'id'=>$data->major_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major_name')); ?>:</b>
	<?php echo CHtml::encode($data->major_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major_create_time')); ?>:</b>
	<?php echo CHtml::encode($data->major_create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major_info')); ?>:</b>
	<?php echo CHtml::encode($data->major_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department_id')); ?>:</b>
	<?php echo CHtml::encode($data->department_id); ?>
	<br />


</div>