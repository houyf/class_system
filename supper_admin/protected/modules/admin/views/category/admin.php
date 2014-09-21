 
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'advice-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		// 'aid',
		array('name'=> 'cid', 'value' => '$data -> c -> cname'),
		array('name'=> 'user_id', 'value' => '$data -> user -> username'),
		'status',
		'picture',
		array( 
		  'class'=>'CLinkColumn',
		  'header'=>'具体内容',
		  'labelExpression'=>'查看',
		  'urlExpression'=>'Yii::app()->createUrl("admin/advice/view/id/". $data->aid )',
		  // 'htmlOptions'=>array('style' => ''),
		),
		array( 
		  'class'=>'CLinkColumn',
		  'header'=>'标记为已读',
		  'labelExpression'=>'标记为已读',
		  'urlExpression'=>'Yii::app()->createUrl("admin/advice/updateStatus/id/". $data->aid )',
		  // 'htmlOptions'=>array()
		),
		array( 
		  'class'=>'CLinkColumn',
		  'header'=>'是否允许发布',
		  'labelExpression'=>'发布',
		  'urlExpression'=>'Yii::app()->createUrl("admin/advice/announce/id/". $data->aid )',
		  // 'htmlOptions'=>array()
		),
	),
)); ?>
