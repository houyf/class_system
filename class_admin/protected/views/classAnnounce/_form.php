<?php
/* @var $this ClassAnnounceController */
/* @var $model ClassAnnounce */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'class-announce-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	 
	<div class="row">
		<?php echo $form->labelEx($model,'cate_id'); ?>
		<?php echo $form->dropDownList($model,'cate_id', AnnounceCategory::CategoryOptions() ); ?>
		<?php echo $form->error($model,'cate_id'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'announce_content'); ?>
		<?php echo $form->textArea($model,'announce_content'); ?>
		<?php echo $form->error($model,'announce_content'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'start_time'); ?>
		<?php echo $form->dateField($model,'start_time'); ?>
		<?php echo $form->error($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deadline'); ?>
		<?php echo $form->dateField($model,'deadline'); ?>
		<?php echo $form->error($model,'deadline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->dropDownList($model,'level', array( '1' => '1' , '2' => '2' , '3' => '3' , '4' => '4' , '5' => '5')); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->