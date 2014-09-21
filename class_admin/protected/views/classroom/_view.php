<?php
/* @var $this ClassroomController */
/* @var $data Classroom */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->class_id), array('view', 'id'=>$data->class_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_name')); ?>:</b>
	<?php echo CHtml::encode($data->class_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_info')); ?>:</b>
	<?php echo CHtml::encode($data->class_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_create_time')); ?>:</b>
	<?php echo CHtml::encode($data->class_create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major_id')); ?>:</b>
	<?php echo CHtml::encode($data->major_id); ?>
	<br />


</div>