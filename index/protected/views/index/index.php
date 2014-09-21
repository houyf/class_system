 	<div data-role="navbar"> 
        	<ul>
            	<li>
                	<a href="<?php echo Yii::app() -> createUrl('index/announce') ?>" data-ajax="false" >
                    	<img src="http://www.zhangxinxu.com/jq/mobile/images/demo/index/web.png" />
                        <h3>班级公告</h3>
                    </a>
                </li>
                
                <li>
                	<a href="<?php echo Yii::app() -> createUrl('index/tucao') ?>">
                        <img src="http://www.zhangxinxu.com/jq/mobile/images/demo/index/near.png" />
                        <h3>吐槽专区</h3>
                    </a>
                </li>
                <li>
                	<a href="zxx_book.php">
                    	<img src="http://www.zhangxinxu.com/jq/mobile/images/demo/index/star.png" />
                        <h3>个人服务</h3>
                    </a>
                </li>
                <li>
                	<a href="zxx_search.php">	
                        <img src="http://www.zhangxinxu.com/jq/mobile/images/demo/index/zoom.png" />
                        <h3>班级资源</h3>
                    </a>
                </li>
                <li>
                	<a href="zxx_question.php">
                    	<img src="http://www.zhangxinxu.com/jq/mobile/images/demo/index/question.png" />
                        <h3>反馈建议</h3>
                    </a>
                </li>
                <li>
                	<a href="<?php echo $this -> createUrl('index/classmate') ?>">
                    	<img src="http://www.zhangxinxu.com/jq/mobile/images/demo/index/user.png"/>
                        <h3>班级成员</h3>
                    </a>
                </li>
                <li>
                	<a href="<?php echo $this -> createUrl('index/committee') ?>">
                    	<img src="http://www.zhangxinxu.com/jq/mobile/images/demo/index/user.png" />
                        <h3>班委信息</h3>
                    </a>
                </li>
                <li>
                	<a href="zxx_user.php">
                    	<img src="http://www.zhangxinxu.com/jq/mobile/images/demo/index/user.png" />
                        <h3>基友推荐</h3>
                    </a>
                </li>
     
            </ul>
        </div>