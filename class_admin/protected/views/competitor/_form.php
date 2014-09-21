<?php
/* @var $this CompetitorController */
/* @var $model Competitor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'competitor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'competitor_id'); ?>
		<?php echo $form->textField($model,'competitor_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'competitor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position_id'); ?>
		<?php echo $form->dropDownList($model,'position_id', ClassCommittee::positionOptions() ); ?>
		<?php echo $form->error($model,'position_id'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'votes'); ?>
		<?php echo $form->textField($model,'votes'); ?>
		<?php echo $form->error($model,'votes'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->