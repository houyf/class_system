<div class = 'container'>
    <ul  data-role="listview" >
    <h1><?php echo $_GET['cate_name'] ?></h1>
                <?php foreach ($lastest_announces as $row): ?>
                    <li>   
                         <a href="<?php echo Yii::app() -> createUrl('index/announce/cate_id/' . $_GET['cate_id'] . '/announce_id/' . $row->cate_id ) ?>" data-ajax="false" >
                        <h2> <span class='light'>标题 </span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row -> title ?>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <span class='light'> 发布日期 </span>   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <?php echo $row -> start_time ?>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <span class='light'>有效日期 </span>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo $row -> deadline ?>  </h2>
                    </a>
                </li>
                <?php endforeach ?>
                <li>
                         <a href="#cates-panel"  class = 'center'>更多</a>
                    </li>
            </ul>
</div>
 
<div data-role="panel" data-position="left" data-position-fixed="false" data-display="overlay" id="cates-panel" data-theme="a">
<ul data-role="listview" data-theme="a" data-divider-theme="a" style="margin-top:-16px;" class="nav-search"  >

                <?php foreach ($announce_cates as $row): ?>
                    <li>   
                         <a href="<?php echo Yii::app() -> createUrl('index/announce/cate_id/' . $row -> cate_id ) ?>" data-ajax="false" >
                        <h3><?php echo $row -> cate_name ?></h3>
                    </a>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
