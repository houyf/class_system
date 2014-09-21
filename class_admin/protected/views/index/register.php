 <style>
	span[class="required"] {color:red;}
	.width140{width:140px;}
</style>

<script src="js/jquery-1.3.2.min.js" type="text/javascript"> </script>

<h1> 注册班级成员 </h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带有  <span class="required">*</span> 符号的都是必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_name'); ?>
		<?php echo $form->textField($model,'student_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'student_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->emailField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'area_id'); ?>
		<?php echo $form->dropDownList($model,'area_id', CampusArea::campus_areaOptions(), array('name' => 'campus_area')); ?>
		<?php echo $form->error($model,'area_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'building_id'); ?>
		<?php echo $form->dropDownList($model,'building_id', array(), array('class' => 'width140', 'id' => 'building', 'name' => 'building') ); ?>
		<?php echo $form->error($model,'building_id'); ?>
 	<div class="row">

	<div class="row">
		<?php echo $form->labelEx($model,'dorm_id'); ?>
		<?php echo $form->dropDownList($model,'dorm_id', array(), array('class' => 'width140', 'id' => 'dorm') ); ?>
		<?php echo $form->error($model,'dorm_id'); ?>
 	<div class="row">
 
	<div class="row">
		<?php echo $form->labelEx($model,'birthday'); ?>
		<?php echo $form->dateField($model,'birthday'); ?>
		<?php echo $form->error($model,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_info'); ?>
		<?php echo $form->textArea($model,'student_info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'student_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'相应院系'); ?>
		<?php echo $form->dropDownList($model,'major_id', Department::departmentOptions(), array('name' => 'department_id')); ?>
	</div>		

	<div class="row">
		<?php echo $form->labelEx($model,'major_id'); ?>
		<?php echo $form->dropDownList($model,'major_id', array(), array('class' => 'width140', 'id' => 'major_id')); ?>
		<?php echo $form->error($model,'major_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class_id'); ?>
		<?php echo $form->dropDownList($model,'class_id', array(), array('class' => 'width140', 'id' => 'class_id') ); ?>
		<?php echo $form->error($model,'class_id'); ?>
	</div>

	<br>
	<span class = 'required'>   最好填写教务系统的相应登录名和密码， 这样可以获取更多查询的服务</span>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'login_name'); ?>
		<?php echo $form->textField($model,'login_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'login_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'login_psw'); ?>
		<?php echo $form->textField($model,'login_psw',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'login_psw'); ?>
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
			if(dep_id == '') 
			{
			  $("#major_id").html(''); 
			  $("#class_id").html(''); 
			}
			 $.ajax
			 ({
			 	type: 'post', 
			 	data:'department_id=' + dep_id,
			 	url: "<?php echo $this -> createUrl('classroom/getMajors') ?>" ,
			 	success: function(data){
			 		var result = eval('(' + data + ')');
			 		$("#major_id").html(result['htmlData']);
			 	}
			 }) 
		})	

		$("#major_id").change(function() 
		{
			var major_id = $(this).val();
			// alert(major_id);
			if(major_id == '') 
			{
			  $("#class_id").html(''); return ; 
			}
			 $.ajax
			 ({
			 	type: 'post', 
			 	data:'major_id=' + major_id,
			 	url: "<?php echo $this -> createUrl('classroom/getClasses') ?>" ,
			 	success: function(data){
			 		//alert(data);
			 		var result = eval('(' + data + ')');
			 		$("#class_id").html(result['htmlData']);
			 	}
			 }) 
		})
 
		$("select[name=campus_area]").change(function() 
		{
			var area_id = $(this).val();
			if(area_id == '')
			 {
				 $("#building").html('');
				 $("#dorm").html('');
				// $("#building").val('');
			}
			 $.ajax
			 ({
			 	type: 'post', 
			 	data:'area_id=' + area_id,
			 	url: "<?php echo $this -> createUrl('building/getBuildings') ?>" ,
			 	success: function(data){
			 		var result = eval('(' + data + ')');
			 		$("#building").html(result['htmlData']);
			 	}
			 })
		})	 

		$("select[id=building]").change(function() 
		{
			var building_id = $(this).val();
			if(building_id == '')
			 {
				 $("#dorm").html('');
			}
			 $.ajax
			 ({
			 	type: 'post', 
			 	data:'building_id=' + building_id,
			 	url: "<?php echo $this -> createUrl('dorm/getDorms') ?>" ,
			 	success: function(data){
			 		var result = eval('(' + data + ')');
			 		$("#dorm").html(result['htmlData']);
			 	}
			 })
		})	 

	})

</script>




