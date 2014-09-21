<!DOCTYPE html>
<html>
<head>
   <title>Bootstrap 实例 - 堆叠的水平</title>
   <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <meta  charset='utf-8'>
   <style>
   </style>
</head>
<body>
 <div  style="background-color: #dedef8; box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444; margin-top:30px;">
  	   <h1>  <?php echo $advice -> c -> cname ?></h1>
        <img src="<?php echo $advice -> picture; ?>" style="display:inline-block" >
        <span> <?php echo $advice -> content ;?></span>
</div>
</body>
</html>