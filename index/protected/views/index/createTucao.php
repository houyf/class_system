 

<style>
	textarea{height:100px !important;}
</style>

<div class="form" >

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tucao-form',
	'enableAjaxValidation'=>false,
	// 'data-ajax' => 'false' 
)); ?>
	<div class="row">
		 <input type="hidden" value="<?php echo $_GET['cate_id'] ?>" name='Tucao[tucao_cate_id]' />
	</div> 

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content'); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	 
	<div class="row buttons"> 
		<?php echo CHtml::submitButton($model->isNewRecord ? '发表' : '保存', array( 'data-role'=>'button', 'data-inline' => 'true', 'data-mini'=>'true') ); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->