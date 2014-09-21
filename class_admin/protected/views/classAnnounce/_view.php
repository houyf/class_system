<?php
/* @var $this ClassAnnounceController */
/* @var $data ClassAnnounce */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('announce_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->announce_id), array('view', 'id'=>$data->announce_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cate_id')); ?>:</b>
	<?php echo CHtml::encode($data->cate_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_time')); ?>:</b>
	<?php echo CHtml::encode($data->start_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deadline')); ?>:</b>
	<?php echo CHtml::encode($data->deadline); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />


</div>