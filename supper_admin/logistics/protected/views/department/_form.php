<style>
	span[class="required"] {color:red;}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'department-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带有  <span class="required">*</span> 符号的都是必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'department_name'); ?>
		<?php echo $form->textField($model,'department_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'department_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department_create_time'); ?>
		<?php echo $form->textField($model,'department_create_time'); ?>
		<?php echo $form->error($model,'department_create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department_info'); ?>
		<?php echo $form->textArea($model,'department_info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'department_info'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->