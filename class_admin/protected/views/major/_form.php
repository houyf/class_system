 <style>
	span[class="required"] {color:red;}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'major-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带有  <span class="required">*</span> 符号的都是必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'major_name'); ?>
		<?php echo $form->textField($model,'major_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'major_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'major_create_time'); ?>
		<?php echo $form->textField($model,'major_create_time'); ?>
		<?php echo $form->error($model,'major_create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'major_info'); ?>
		<?php echo $form->textArea($model,'major_info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'major_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department_id'); ?>
		<?php echo $form->dropDownList($model,'department_id', Department::departmentOptions()); ?>
		<?php echo $form->error($model,'department_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>





