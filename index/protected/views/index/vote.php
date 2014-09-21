        <!-- <meta http-equiv="Refresh" content="1; url=http://www.baidu.com"/> -->
   <?php  if($_GET['error'] == 1)   {echo '<h1> 现在这个职位没有人竞选，你投毛票</h1>' ;} ?>
   <?php  if($_GET['error'] == 2)   {echo '<h1> 投票成功</h1>' ;} ?>
<?php if($_GET['error'] == 0) { ?>    
        <div data-role="navbar"> 
        	<ul>
                <?php foreach ($model as $row): ?>
                    <li>   
                         <a href="<?php echo Yii::app() -> createUrl('index/vote/position_id/' . $row -> position_id . '/competitor_id/' . $row -> competitor_id  ) ?>" data-ajax="false" >
                        <!-- <img src="/jq/mobile/images/demo/index/web.png" /> -->
                        <h3><?php echo   Student::model( ) -> findByPK($row -> competitor_id) -> student_name?></h3>
                    </a>
                </li>
                <?php endforeach ?>
                
            </ul>
        </div>
        <?php } ?>
