 <div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'class-admin-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'login_name'); ?>
		<?php echo $form->textField($model,'login_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'login_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_psw'); ?>
		<?php echo $form->textField($model,'student_psw',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'student_psw'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>

