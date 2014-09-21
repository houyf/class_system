<?php
/* @var $this TucaoCategoryController */
/* @var $model TucaoCategory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tucao-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tucao_cate_name'); ?>
		<?php echo $form->textField($model,'tucao_cate_name',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tucao_cate_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->