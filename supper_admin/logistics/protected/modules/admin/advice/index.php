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

<!-- 	 * @property string $aid
 * @property string $cid
 * @property string $user_id
 * @property string $content
 * @property integer $status
 * @property string $picture
 * @property string $create_time
  -->
    <div 
         style="background-color: #dedef8;
         box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444; margin-top:30px;">
   <table class="table  table-bordered">
   <thead>
	<tr>
	<?php $set = array(); ?>
	<?php foreach ($advice_list[0] as $key => $value) {
		echo" <th>$key</th>";
		array_push($set, $key);
	} ?>	
 	 <th>Detail</th>;
 	 <th>voteAsRead</th>;
	</tr>
</thead>
</tbody>	
	 <?php foreach ($advice_list as $row ) { ?>
		<tr> 
		<?php foreach ($set as $key) {  ?>
		 	<?php echo "<td>" . $row->$key . "</td>"; ?>
		  <?php } ?>
		  <td><a href="<?php echo $this->createUrl('advice/advice/aid/' . $row->aid) ?>">查看</a></td>
		  <td><a href="<?php echo $this->createUrl('advice/updateStatus/aid/' . $row->aid) ?>">标记为已读</a></td>
		</tr> 
	 <?php } ?>
</tbody>
</table>
	<div  class = 'col-md-offset-4 '  >
	<?php $this->widget('CLinkPager', array(
	 		   'pages' => $pager,
	)) ?>
	</div>
</div>
</body>
</html>

