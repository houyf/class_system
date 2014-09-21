 <!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8"/ >
	<link rel="stylesheet" href="jquery.mobile-1.3.2.min.css">
	<script src="jquery-1.8.3.min.js"></script>
	<script src="jquery.mobile-1.3.2.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>z
<style>
        body{text-align: center;}
        .center{text-align: center!important;}
        /*h1{font-size: 20px !important;}*/
        /*#head{ font-size: 20px !important;}*/
        /*#header{height:50px !important;}*/
        span{font-weight: 300;}
</style>
</head>
<body>
	
	<div data-role="page">

	<div data-role="header" data-position="fixed"  id="header">
	 	 <a  data-role="button" data-icon="home"  href="<?php echo $this -> createUrl('index/index') ?>" >首页</a>
		    <h1>欢迎来到计科一班 </h1>
		    <a data-role="button" data-icon="back"  data-rel="back" > 后退 </a>
	</div><!-- /头部 -->

	<div data-role="content">	
	      <?php echo $content; ?>
	</div><!-- /内容 -->

	<div data-role="footer" data-position="fixed" >
		<h4>SUN YAT-SEN UNIVERSITY</h4>
	</div><!-- /底部 --></div><!-- /页面 -->
 
</body>
</html>
