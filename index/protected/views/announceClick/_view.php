<?php
/* @var $this AnnounceClickController */
/* @var $data AnnounceClick */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('click_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->click_id), array('view', 'id'=>$data->click_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('announce_id')); ?>:</b>
	<?php echo CHtml::encode($data->announce_id); ?>
	<br />


</div>