<style>
	span[class="required"] {color:red;}
	.width140{width:140px;}
</style>
<script src="js/jquery-1.3.2.min.js" type="text/javascript"> </script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dorm-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带有  <span class="required">*</span> 符号的都是必填项</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'area_id'); ?>
		<?php echo $form->dropDownList($model,'area_id', CampusArea::campus_areaOptions(), array('name' => 'campus_area')); ?>
		<?php echo $form->error($model,'area_id'); ?>
	</div>
	
 	<div class="row">
		<?php echo $form->labelEx($model,'building_id'); ?>
		<?php echo $form->dropDownList($model,'building_id', array(), array('class' => 'width140', 'id' => 'building') ); ?>
		<?php echo $form->error($model,'building_id'); ?>

 	<div class="row">
		<?php echo $form->labelEx($model,'dorm_id'); ?>
		<?php echo $form->textField($model,'dorm_id'); ?>
		<?php echo $form->error($model,'dorm_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dorm_name'); ?>
		<?php echo $form->textField($model,'dorm_name'); ?>
		<?php echo $form->error($model,'dorm_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>

<script>
	$(function()
	{
		$("select[name=campus_area]").change(function() 
		{
			var area_id = $(this).val();
			if(area_id == '')
			 {
				 $("#building").html('');
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
	})
</script>


