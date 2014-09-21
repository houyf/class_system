 <div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'class-committee-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'position_name'); ?>
		<?php echo $form->textField($model,'position_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'position_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position_info'); ?>
		<?php echo $form->textArea($model,'position_info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'position_info'); ?>
	</div>
	
	<?php if($this -> getAction() -> getId() == 'create') { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'winner_id'); ?>
		<?php echo $form->textField($model,'winner_id'); ?>
		<?php echo $form->error($model,'winner_id'); ?>
	</div>
	<?php } ?>

	<?php if($this -> getAction() -> getId() == 'update') { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'winner_id'); ?>
		<?php echo $form->dropDownList($model,'winner_id', Competitor::CompetitorOptions($model -> position_id)); ?>
		<?php echo $form->error($model,'winner_id'); ?>
	</div>
	<?php } ?>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->