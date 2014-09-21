	<div data-role="navbar"> 
        	<ul>
                <?php foreach ($model as $row): ?>
                    <li>   
                         <a href="<?php echo Yii::app() -> createUrl('index/committee/position_id/' . $row -> position_id ) ?>" data-ajax="false" >
                        <!-- <img src="http://www.zhangxinxu.com/q/mobile/images/demo/index/web.png" /> -->
                        <img src="<?php echo $row -> picture ;?>" height="100" width="150" />
                        <h3><?php echo $row -> position_name ?></h3>
                    </a>
                </li>
                <?php endforeach ?>
                
            </ul>
        </div>
