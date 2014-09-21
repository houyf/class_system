 
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'columns'=>array(
		'student_id',
		'student_name',
		'address',
		'dorm_id', 		 
		array('name' =>'class_id', 'value' =>'$data->classroom->class_name' ),
		array('name' => 'major_id', 'value' => '$data->major->major_name'),
		array(
			'class'=>'CButtonColumn',
		),
		array( 
		  'class'=>'CLinkColumn',
		  'header'=>'通过审核',
		  'labelExpression'=>'通过审核',
		  'urlExpression'=>'Yii::app()->createUrl("student/pass/id/". $data -> student_id)',
		),
	)
)); ?>




