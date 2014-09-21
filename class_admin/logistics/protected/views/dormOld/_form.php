 <style>
	span[class="required"] {color:red;}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dorm-form',
	'enableAjaxValidation'=>false,
)); ?>

	 <p class="note">带有  <span class="required">*</span> 符号的都是必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'dorm_name'); ?>
		<?php echo $form->textField($model,'dorm_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'dorm_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->