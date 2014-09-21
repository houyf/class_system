<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine or request Chrome Frame -->
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />

  <!-- Use title if it's in the page YAML frontmatter -->
  <title> 苦逼网络操作系统团队</title>

  <link href="css/admin.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="css/admin_cus.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
  <!--[if lt IE 9]>
  <script src="js/vendor/html5shiv.js" type="text/javascript"></script>
  <script src="js/vendor/excanvas.js" type="text/javascript"></script>
  <![endif]-->

  <style> 
        .total{ width: 1060px !important; height:800px;}
  </style>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <script src="js/admin/jquery.js" type="text/javascript"></script>
</head>

<body>
<div class="navbar navbar-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container-fluid">

      <a class="brand" href="?r=admin"> 苦逼网络操作系统团队</a>

      <!-- the new toggle buttons -->

      <ul class="nav pull-right">

        <li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary">
			<button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button>
		</li>

        <li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top">
			<button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button>
			</li>

      </ul>


          <div class="nav-collapse nav-collapse-top collapse">
            <ul class="nav pull-right">
			  <li><span class="muted">您好，
			  	<?php
					if(Yii::app()->user)
			  			echo Yii::app()->user->username;
				?>
			  。&nbsp;&nbsp;</span><li>
              <li><a href="<?php echo Yii::app() -> createUrl('site/logout');?>"><i class="icon-signout"></i> 退出</a></li>
            </ul>
          </div>

    </div>
  </div>
</div>
<div class="sidebar-background">
  <div class="primary-sidebar-background"></div>
</div>

<div class="primary-sidebar">

  <!-- Main nav -->
  <ul class="nav nav-collapse collapse nav-collapse-primary">

          <li class="dark-nav ">
              <span class="glow"></span>

              <a id="department" class="accordion-toggle collapsed " data-toggle="collapse" href="#partmanage">
                  <i class="icon-sitemap icon-2x"></i>
                    <span>
                      个人信息管理
                      <i class="icon-caret-down"></i>
                    </span>

              </a>

              <ul id="partmanage" class="collapse ">
					<li class="">
                      <a id="addpart"   onclick="window.frames[0].location.href='<?php echo $this -> createUrl('index/self_info');?>'"   />
                          <i class="icon-plus-sign"></i> 个人信息
                      </a>
                    </li>

                    <li class="">
                      <a id="removepart" onclick="window.frames[0].location.href='<?php echo $this -> createUrl('index/modify_info');?>'" >
                          <i class="icon-remove-sign"></i> 修改信息
                      </a>
                    </li>
                    
                      <li class="">
                      <a id="removepart" onclick="window.frames[0].location.href='<?php echo $this -> createUrl('modify_psw');?>'">
                          <i class="icon-remove-sign"></i> 修改密码
                      </a>
                    </li>

                     <li class="">
                      <a id="removepart" onclick="window.frames[0].location.href='<?php echo $this -> createUrl('send_email');?>'" >
                          <i class="icon-remove-sign"></i> 邮箱提醒
                      </a>
                    </li>
              </ul>
            </li>

			<li class="dark-nav ">

              <span class="glow"></span>

              <a id="workFast"class="accordion-toggle collapsed " data-toggle="collapse" href="#frontmanage">
                  <i class="icon-home icon-2x"></i>
                    <span>
                      师生反馈管理
                      <i class="icon-caret-down"></i>
                    </span>
              </a>
              <ul id="frontmanage" class="collapse ">
					<li class="">
                      <a id="workfast"onclick="window.frames[0].location.href='<?php echo $this -> createUrl('advice/admin');?>'" >
                          <i class="icon-plus-sign"></i> 未读反馈
                      </a>
                    </li>

                        <li class="">
                      <a id="workfast"  onclick="window.frames[0].location.href='<?php echo $this -> createUrl('category/index');?>'"  ?>
                          <i class="icon-plus-sign"></i> 反馈分类
                      </a>
                    </li>
                              <li class="">
                      <a id="workfast" onclick="window.frames[0].location.href='<?php echo $this -> createUrl('advice/index');?>'" >
                          <i class="icon-plus-sign"></i> 反馈统计
                      </a>
                    </li>

                        <li class="">
                      <a id="workfast" href="<?php echo $this->createUrl("workFast/create")?>">
                          <i class="icon-plus-sign"></i> 清除过期反馈
                      </a>
                    </li>

              </ul>

          </li>
          <li class="dark-nav ">

              <span class="glow"></span>

              <a id ="slider" class="accordion-toggle collapsed " data-toggle="collapse" href="#Slider">
                  <i class="icon-picture icon-2x"></i>
                    <span>
                      班级成员
                      <i class="icon-caret-down"></i>
                    </span>

              </a>

              <ul id="Slider" class="collapse ">
			       <li class="">
                      <a id="slider"   onclick="window.frames[0].location.href='<?php echo Yii::app()-> createUrl('student/index');?>'"  >
                          <i class="icon-plus-sign"></i> 待确认成员
                      </a>
                    </li>
                          <li class="">
                      <a id="slider"  onclick="window.frames[0].location.href='<?php echo Yii::app()-> createUrl('student/admin');?>'">
                          <i class="icon-plus-sign"></i>查看所有成员 
                      </a>
                    </li>
                      <li class="">
                      <a id="slider"onclick="window.frames[0].location.href='<?php echo Yii::app()-> createUrl('student/listDorm');?>'">
                          <i class="icon-plus-sign"></i>按宿舍查看
                      </a>
                    </li>
                    <li class="">
                      <a id="slider" href="<?php echo $this->createUrl("slider/create")?>">
                          <i class="icon-plus-sign"></i> 统计成员信息
                      </a>
                    </li>
              </ul>

            </li>

			<li class="dark-nav ">

              <span class="glow"></span>

              <a id="rule" class="accordion-toggle collapsed " data-toggle="collapse" href="#rulemanage">
                  <i class="icon-list-alt icon-2x"></i>
                    <span>
                     班级公告管理
                      <i class="icon-caret-down"></i>
                    </span>
              </a>
              <ul id="rulemanage" class="collapse ">
					<li class="">
                      <a id="addrule" onclick="window.frames[0].location.href='<?php echo Yii::app()-> createUrl('announceCategory/create');?>'"  >
                          <i class="icon-plus-sign"></i> 添加公告类别
                      </a>
                    </li>

                    <li class="">
                      <a id="removerule"   onclick="window.frames[0].location.href='<?php echo Yii::app()-> createUrl('announceCategory/admin');?>'"   >
                          <i class="icon-remove-sign"></i> 编辑公告类别
                      </a>
                    </li>
					<li class="">
                      <a  onclick="window.frames[0].location.href='<?php echo Yii::app()-> createUrl('classAnnounce/create');?>'" >
                          <i class="icon-plus-sign"></i> 添加公告
                      </a>
                    </li>
					<li class="">
                      <a  onclick="window.frames[0].location.href='<?php echo Yii::app()-> createUrl('classAnnounce/admin');?>'" >
                          <i class="icon-remove-sign"></i> 编辑公告
                      </a>
                    </li>
              </ul>

            </li>




            <li class="dark-nav ">
              <span class="glow"></span>
              <a id="work" class="accordion-toggle collapsed " data-toggle="collapse" href="#thingsmanage">
                  <i class="icon-folder-open icon-2x"></i>
                  <span>
                      班委管理
                      <i class="icon-caret-down"></i>
                    </span>
              </a>
              <ul id="thingsmanage" class="collapse ">
			<!--     <li class=""> 
                            <a href="<?php echo $this->createUrl("work/create")?>">
                                <i class="icon-plus-sign"></i> 班委信息 
                            </a>
                          </li> -->

                    <li class="">
                      <a    onclick="window.frames[0].location.href='<?php echo Yii::app()-> createUrl('classCommittee/create');?>'"  >
                          <i class="icon-remove-sign"></i> 添加班委角色
                      </a>
                    </li>
                    
                    <li class="">
                      <a onclick="window.frames[0].location.href='<?php echo Yii::app()-> createUrl('classCommittee/admin');?>'" >
                          <i class="icon-plus-sign"></i>班委信息管理
                      </a>
                    </li>
					<li class="">
                      <a onclick="window.frames[0].location.href='<?php echo Yii::app()-> createUrl('classCommittee/positions');?>'">
                          <i class="icon-plus-sign"></i> 班委竞选
                      </a>
                    </li>
					<li class="">
                      <a href="<?php echo $this->createUrl("workCate/admin")?>">
                          <i class="icon-remove-sign"></i> 优秀评选
                      </a>
                    </li>

              </ul>
            </li>
			<li class="dark-nav "> 
              <span class="glow"></span>
              <a id="news" class="accordion-toggle collapsed " data-toggle="collapse" href="#newsmanage">
                  <i class="icon-globe icon-2x"></i>
                  <span>
                       班级吐槽专区
                      <i class="icon-caret-down"></i>
                    </span>
              </a>
              <ul id="newsmanage" class="collapse ">
					<li class="">
                      <a   onclick="window.frames[0].location.href='<?php echo Yii::app()-> createUrl('tucaoCategory/create');?>'"  >
                          <i class="icon-plus-sign"></i>添加吐槽类型
                      </a>
                    </li>

                    <li class="">
                      <a  onclick="window.frames[0].location.href='<?php echo Yii::app()-> createUrl('tucaoCategory/admin');?>'"   >
                          <i class="icon-remove-sign"></i> 吐槽类型编辑
                      </a>
                    </li>
                      
                   <!--    <li class="">
                   <a href="<?php echo $this->createUrl("Publisher/create")?>">
                       <i class="icon-plus-sign"></i>  查看近期吐槽
                   </a>
                                       </li> -->

					<li class="">
                      <a href="<?php echo $this->createUrl("newsCate/admin")?>">
                          <i class="icon-remove-sign"></i>   吐槽统计
                      </a>
                    </li>

              </ul>
            </li>
                
              <li class="dark-nav "> 
              <span class="glow"></span>
              <a id="news" class="accordion-toggle collapsed " data-toggle="collapse" href="#newsmanage">
                  <i class="icon-globe icon-2x"></i>
                  <span>
                      班级资源管理
                      <i class="icon-caret-down"></i>
                    </span>
              </a>
              <ul id="newsmanage" class="collapse ">
          <li class="">
                      <a href="<?php echo $this->createUrl("news/create")?>">
                          <i class="icon-plus-sign"></i>添加资源分类
                      </a>
                    </li>

                    <li class="">
                      <a href="<?php echo $this->createUrl("news/admin")?>">
                          <i class="icon-remove-sign"></i> 编辑资源分类
                      </a>
                    </li>
                      
                      <li class="">
                      <a href="<?php echo $this->createUrl("Publisher/create")?>">
                          <i class="icon-plus-sign"></i>  管理上传资源
                      </a>
                    </li>
              </ul>
            </li>   



     </ul>
      
  </div>

  <script src="js/kindeditor.js" type="text/javascript"></script>
  <script src="js/zh_CN.js" type="text/javascript"></script>
  <!-- 刷新后展开菜单 -->
  <script>
     var id="<?php  echo Yii::app()->controller->id;?>";
     var id_action="<?php echo Yii::app()->controller->action->id;?>";
     $(function(){
         if(id=="workCate"||id=="ruleCate"||id=="newsCate")id=id.substr(0,4);
         if(id_action!="index")
             $("#"+id).click();
     })
  </script>

        <iframe class = "main-content  total "  >
				  <?php echo $content; ?>
		</iframe>

</body>
</html>
