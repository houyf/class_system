        	<ul  data-role="listview" >

	<h1><?php echo $_GET['cate_name'] ?></h1>
                <?php foreach ($model as $row): ?>
                    <li>   
                         <a href="<?php echo Yii::app() -> createUrl('index/announce/cate_id/' . $_GET['cate_id'] . '/announce_id/' . $row->cate_id ) ?>" data-ajax="false" >
                        <h2> <span class='light'>标题 </span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row -> title ?>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        	<span class='light'> 发布日期 </span>   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <?php echo $row -> start_time ?>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <span class='light'>有效日期 </span>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo $row -> deadline ?>  </h2>
                    </a>
                </li>
                <?php endforeach ?>

            </ul>

