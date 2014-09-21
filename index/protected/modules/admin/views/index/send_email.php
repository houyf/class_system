
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php CHtml::$afterRequiredLabel = '';?>

	<div class="row">

		<?php echo $form->labelEx($model,'send_email'); ?>
		<?php echo $form->dropDownList($model,'send_email', array('0' => '关闭邮箱提醒功能', '1' => '开启邮箱提醒功能 ') ); ?>
		<?php echo $form->error($model,'send_email'); ?>
	</div> 

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

 <?php $this->endWidget(); ?>

</div>