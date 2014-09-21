<?php
/* @var $this CompetitorController */
/* @var $data Competitor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('competitor_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->competitor_id), array('view', 'id'=>$data->competitor_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_id')); ?>:</b>
	<?php echo CHtml::encode($data->position_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('votes')); ?>:</b>
	<?php echo CHtml::encode($data->votes); ?>
	<br />


</div>