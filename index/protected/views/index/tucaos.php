<ul  data-role="listview"  >
<h1> <?php echo $_GET['cate_name'] ?> </h1>


	<a    data-role='button' href="<?php echo $this -> createUrl('index/tucao/self/true/cate_id/' .  $_GET['cate_id'] ) ?>"  id = "<?php echo $row -> tucao_cate_id ?>"  name = "tucao"  data-ajax='false'  > <h1>  我要发表吐槽  </h1> </a>
    <?php foreach ($model as $row): ?>
        <li>   
           <h2> &nbsp&nbsp&nbsp <span class='light'> 吐槽者 </span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           	<?php echo Student::model() -> findByPk($row -> student_id) -> student_name ?>  
            	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span class='light'>  吐槽时间 </span>   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <?php echo $row -> tucao_time ?>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <span class='light'> 吐槽内容</span>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <?php echo $row ->  content?>  
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <button id = 'support' name="<?php echo $row->tucao_id ?>" data-min = 'true' data-inline='true'>赞</button> 
	<button  id='oppose' data-min = 'true' data-inline='true' name="<?php echo $row->tucao_id ?>" >low</button> </h2>
          </h2>
        </a>
    </li>
    <?php endforeach ?>
    

</ul>

 <script language="javascript" > 
$(function(){
	//alert(1);
	$("#support").click(function() 
	{	
		var tucao_id = $('#support').attr('name');
		// alert(tucao_id);
		 $.ajax
		 ({
		 	type: 'post', 
		 	data: 'tucao_id=' + tucao_id, 
		 	url: "<?php echo $this -> createUrl('index/support') ?>" ,
		 	success: function(data){
		 		//alert(data);
		 	}
		 })
	})	
	$("#oppose").click(function() 
	{	
		var tucao_id = $('#oppose').attr('name');
		//alert(tucao_id);
		 $.ajax
		 ({
		 	type: 'post', 
		 	data: 'tucao_id=' + tucao_id, 
		 	url: "<?php echo $this -> createUrl('index/oppose') ?>" ,
		 	success: function(data){
		 	}
		 })
	})	 

	/*$("button[name=tucao]").click(function(){
 		var node1 = $('<textarea name="content"></textarea>')
 		var node2 = $('<button>提交</button>');
 		node2.insertAfter("button[name=tucao]");
 		node1.insertAfter("button[name=tucao]");
	})*/

})
</script>

