<?php
/* @var $this BuildingController */
/* @var $model Building */
/* @var $form CActiveForm */
?>
<style>
	span[class="required"] {color:red;}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'building-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="note">带有  <span class="required">*</span> 符号的都是必填项</p>
	 
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'area_id'); ?>
		<?php echo $form->dropDownList($model,'area_id', CampusArea::campus_areaOptions()); ?>
		<?php echo $form->error($model,'area_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'building_id'); ?>
		<?php echo $form->textField($model,'building_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'building_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>

