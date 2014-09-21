<style>
	span[class="required"] {color:red;}
	.width140{width:140px;}
</style>

<script src="js/jquery-1.3.2.min.js" type="text/javascript"> </script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'classroom-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带有  <span class="required">*</span> 符号的都是必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'class_name'); ?>
		<?php echo $form->textField($model,'class_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'class_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'class_create_time'); ?>
		<?php echo $form->textField($model,'class_create_time', array('size'=>50,'maxlength'=>50) ); ?>
		<?php echo $form->error($model,'class_create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class_info'); ?>
		<?php echo $form->textArea($model,'class_info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'class_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'相应院系'); ?>
		<?php echo $form->dropDownList($model,'major_id', Department::departmentOptions(), array('name' => 'department_id')); ?>
	</div>		
		
	<div class="row">
		<?php echo $form->labelEx($model,'major_id'); ?>
		<?php echo $form->dropDownList($model,'major_id', array(), array('class' => 'width140', 'id' => 'major')); ?>
		<?php echo $form->error($model,'major_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>

<script>
	$(function()
	{
		$("select[name=department_id]").change(function() 
		{
			var dep_id = $(this).val();
			if(dep_id == '')  $("#major").html('');
			 $.ajax
			 ({
			 	type: 'post', 
			 	data:'department_id=' + dep_id,
			 	url: "<?php echo $this -> createUrl('classroom/getMajors') ?>" ,
			 	success: function(data){
			 		var result = eval('(' + data + ')');
			 		$("#major").html(result['htmlData']);
			 	}
			 })
		})	
	})

</script>
