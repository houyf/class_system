<h1> 管理员  </h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'admin_id',
		//'username',
		//'password',
		//'lock',
		'last_logintime',
		'email',
		'send_email',
		//'level',
		'real_name',
	),
)); ?>
