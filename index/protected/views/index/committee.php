<?php 
Yii::app()->clientScript->registerCss('class1', "
 .align_center{text-align:center;}
 .link{text-decoration:none;}
");
?>
<h1 class = 'align_center'>角色基本信息</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'position_name',
		'position_info',
		'start_time',
		array( 'type' => 'raw',  'name' => 'winner_id' , 'value' =>
		 $model -> winner_id ?   '<a  class ="link" href=' . $this -> createUrl('index/classmate/student_id/' . $model -> winner_id ) . '>' .  Student::model() -> findByPk($model -> winner_id ) ->student_name . '</a>'  
		 : '暂时为空'),
		array('name' => 'class_id', 'value' => Classroom::model() -> findByPk($model -> class_id) -> class_name),
	),
)); ?>

<?php if($model -> winner_id == 0) { ?>
 
                         <a    data-role='button' data-inline = 'true' data-mini='true'  href="<?php echo Yii::app() -> createUrl('index/compete/position_id/' . $model -> position_id ) ?>" data-ajax="false" >
                        <!-- <img src="/jq/mobile/images/demo/index/web.png" /> -->
                        <h3>竞选</h3>
                    </a>
       
                         <a data-role='button' data-inline = 'true' data-mini='true'  href="<?php echo Yii::app() -> createUrl('index/vote/position_id/' . $model-> position_id ) ?>" data-ajax="false" >
                        <!-- <img src="/jq/mobile/images/demo/index/web.png" /> -->
                        <h3>投票</h3>
                    </a>
         
<?php } ?>










