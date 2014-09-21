<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php CHtml::$afterRequiredLabel = '';?>
	<div class="row">
		   
		<?php echo $form->labelEx($model,'旧登录名'); ?>
		<?php echo $form->textField($model,'old_username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'old_username'); ?>
	</div> 

	<div class="row">
		<?php echo $form->labelEx($model,'旧密码'); ?>
		<?php echo $form->passwordField($model,'old_password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'old_password'); ?>
	</div> 
	

	<div class="row">
		<?php echo $form->labelEx($model,'新登录名'); ?>
		<?php echo $form->textField($model,'username',array('size'=>40,'maxlength'=>40 , 'value' => '')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div> 

	<div class="row">
		<?php echo $form->labelEx($model,'新密码'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>40,'maxlength'=>40, 'value' => '')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div> 


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>