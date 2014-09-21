<?php
/* @var $this ClassAdminController */
/* @var $data ClassAdmin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_admin_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->class_admin_id), array('view', 'id'=>$data->class_admin_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_name')); ?>:</b>
	<?php echo CHtml::encode($data->login_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_psw')); ?>:</b>
	<?php echo CHtml::encode($data->student_psw); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />


</div>