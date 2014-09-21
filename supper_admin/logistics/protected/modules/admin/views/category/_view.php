<?php
/* @var $this CategoryController */
/* @var $data Category */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cname')); ?>:</b>
	<?php echo CHtml::encode($data->cname); ?>
	 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<b><?php echo CHtml::encode($data->getAttributeLabel('num')); ?>:</b>
	<?php echo CHtml::encode($data->num);   ?>
	 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	 <a href="<?php echo $this -> createUrl('category/getAdvice/id/' . $data -> cid ) ?>">查看相应反馈 </a>
	  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    
	 <a href="<?php echo $this -> createUrl('category/line/id/' . $data -> cid ) ?>">反馈统计表  </a>
	   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	 <a href="<?php echo $this -> createUrl('category/pie/id/' . $data -> cid ) ?>">反馈饼状图</a>
	  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	 <a href="<?php echo $this -> createUrl('category/pie/id/' . $data -> cid ) ?>">反馈柱形图</a>
	<br />
	
</div>