<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-grid',
	'dataProvider'=>$model,
	// 'filter'=>$model,
	'columns'=>array(
		'student_id',
		'student_name',	  
		array( 
		  'class'=>'CLinkColumn',
		  'header'=>'详细信息',
		  'labelExpression'=>'详细信息',
		  'urlExpression'=>'Yii::app()->createUrl("index/classmate/student_id/". $data->student_id )',
		),
	),
));*/ ?>
							<h1> 班级成员 </h1>
        	<ul  data-role="listview"  data-autodividers="true" data-inset="true" data-filter="true" data-filter-placeholder="搜索姓名或学号 ..." >

                <?php foreach ($model as $row): ?>
                    <li>   
                         <a href="<?php echo Yii::app() -> createUrl('index/classmate/student_id/'. $row->student_id ) ?>" data-ajax="false" >

                        <h2> &nbsp&nbsp&nbsp <span class='light'>名字 </span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row -> student_name ?>  
                        	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span class='light'> 学号  </span>   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <?php echo $row -> student_id ?>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <span class='light'> 联系方式</span>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <?php echo $row ->  phone?>  
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp      </h2>
                      </h2>
                    </a>
                </li>
                <?php endforeach ?>

            </ul>


