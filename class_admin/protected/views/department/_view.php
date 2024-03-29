<?php
/* @var $this DepartmentController */
/* @var $data Department */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('department_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->department_id), array('view', 'id'=>$data->department_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department_name')); ?>:</b>
	<?php echo CHtml::encode($data->department_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department_create_time')); ?>:</b>
	<?php echo CHtml::encode($data->department_create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department_info')); ?>:</b>
	<?php echo CHtml::encode($data->department_info); ?>
	<br />


</div>