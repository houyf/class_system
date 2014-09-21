    <div data-role="navbar"> 
            <ul>
                <?php foreach ($model as $row): ?>
                    <li>   
                         <a href="<?php echo Yii::app() -> createUrl('index/tucao/cate_id/' . $row -> tucao_cate_id ) ?>" data-ajax="false" >
                        <img src="http://www.zhangxinxu.com/jq/mobile/images/demo/index/web.png" />
                        <h3><?php echo $row -> tucao_cate_name ?></h3>
                    </a>
                </li>
                <?php endforeach ?>

            </ul>
        </div>
