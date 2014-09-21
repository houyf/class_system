<?php
/* @var $this DormController */
/* @var $data Dorm */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('dorm_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->dorm_id), array('view', 'id'=>$data->dorm_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dorm_name')); ?>:</b>
	<?php echo CHtml::encode($data->dorm_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('building_id')); ?>:</b>
	<?php echo CHtml::encode($data->building_id); ?>
	<br />


</div>