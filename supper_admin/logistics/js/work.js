$(document).ready(function(){
//第一次加载 热门事项dep_json
function ajax_drive(obj){
$.get('index.php?r=site/AjaxWork',obj,function(data){
		var workList;
		if (data.workList)workList=data.workList;
		$('#listwork').html('');//初始化ul
		for(var i=0;i<workList.length;i++)
		{
			var a=$('<a>');
			var span=$('<span>');

			span.addClass('badge');
			span.text('14');

			a.attr('href','index.php?r=site/wd&i='+workList[i]['work_id']);
			a.attr('target','_blank');
			a.html("["+workList[i].publisher+"]"+workList[i].work_name);
			a.addClass("list-group-item");

			$('#listwork').append(a);
		}
		pagelist(data.workPageCount,obj.page);

	},'json',false);
}

function pagelist(count,page)  //页面总数  当前页面
{
		//加载分页
		var div=$('<div>');
		var ul=$('<ul>');
		var a=$('<a>');
		var li=$('<li>');

		if(page>1){
			a.html('首页');
			li.html(a);
			ul.html(li);

			var a=$('<a>');
			var li=$('<li>');

			a.html('&laquo');//上一页
			li.html(a);
			ul.append(li);
		}
		for(var i=max(0,parseInt(page)-5);i<min(count,parseInt(page)+4);i++)//显示当前页和前后4页
		{
		  var li=$('<li>');
		  var a=$('<a>');
		  a.text(i+1);
		  li.html(a);
		  if(i+1==page)li.addClass('active');
		  ul.append(li);
		}
		var li=$('<li>');
		var a=$('<a>');
		if(page<count){
			a.html('&raquo');//下一页
			li.html(a);
			ul.append(li);

			var a=$('<a>');
			var li=$('<li>');
			a.html('末页');
			li.html(a);
			ul.append(li);
		}
		ul.addClass('pagination');
		div.html(ul);
		div.css('text-align','center');

		if(count>1){			//如果分页大于1
			if($('ul').hasClass('pagination'))
			$('.pagination').parent().html(ul);
			else
			$('#listwork').parent().append(div);
		}
		else
			if($('ul').hasClass('pagination'))
			$('.pagination').parent().html('');

		//加载分页 END
		activepagelist(count)//激活分页绑定
		click_listen();

		//如果存在init函数，则执行且只执行一次。
		if(typeof init == 'function')
		{
			init();
			init = '';
		}
		//滚动分页 设置绿色标示
		// $('html,body').animate({scrollTop: '100px'}, 200);
		$('#nav4').parent().css('background','#189e7e');
}

//监听分页被点击
function activepagelist(count){
	$('.pagination li a').click(function(){
		var temp=$(this).text();
		if($(this).text()=='«')temp=parseInt($('.pagination .active a').text())-1;

		if($(this).text()=='»')temp=parseInt($('.pagination .active a').text())+1;

		if($(this).text()=='首页')temp=1;
		if($(this).text()=='末页')temp=count;

		 /****************************************************/
		 		// 这里需要修改
		  /****************************************************/
		var data_ajax ={page:temp,cateId:0,depId:0,is_hot:0,key:''};

		if($('.nav-stacked .active a').attr('id')[0]=='d')
		data_ajax.depId=parseInt($('.fwzn_special .active').attr('id').substr(4));

		if($('.nav-stacked .active a').attr('id')[0]=='w')
		data_ajax.cateId=parseInt($('.fwzn_special .active').attr('id').substr(4));
		if($('.nav-stacked .active a').attr('id')[0]=='h')
		data_ajax.is_hot=1;
		ajax_drive(data_ajax);
	});
}

function min(a,b){
	a=parseInt(a);
	b=parseInt(b);
	if(a>b)return b;
	else return a;
}

function max(a,b){
	a=parseInt(a);
	b=parseInt(b);
	if(a<b)return b;
	else return a;
}


//dep
var dep_pre = '<table class = "table">\
			<tbody id = "tbody">\
			<tr>';
var dep_core='';

for(var i = 0;i<dep_json.length;i++){
		dep_core += '<td><div class = "square" id="depc'+dep_json[i]['dep_id']+'">'+dep_json[i]['dep_name']+'</div></td>';
		if((i+1)%4==0)dep_core+="<tr/><tr>";

}
var dep_last = '\
			   </tr>\
			   </tbody>\
			</table>\
			';



 /***************************************************************************************/
var pub_pre = '<table class = "table">\
			<tbody id = "tbody">\
			<tr>';
var pub_core='';

for(var i = 0;i<pub_json.length;i++){
		pub_core += '<td><div class = "square" id="pubc'+pub_json[i]['pid']+'">'+pub_json[i]['publisher']+'</div></td>';
		if((i+1)%4==0)pub_core+="<tr/><tr>";

}
var pub_last = '\
			   </tr>\
			   </tbody>\
			</table>\
			';

 /************************************************************************************/


var work_pre = '<table class = "table">\
			<tbody id = "tbody">\
			<tr>';
var work_core='';

for(var i = 0;i<work_json.length;i++){
		work_core += '<td><div class = "square" id="work'+work_json[i]['wc_id']+'">'+work_json[i]['wc_name']+'</div></td>';
		if((i+1)%4==0)work_core+="<tr/><tr>";

}
var work_last = '\
			   </tr>\
			   </tbody>\
			</table>\
			';




//监听分类被点击  sider bar
function click_listen(){
	$('#dep').click(
		function(){
			$('.fwzn_special').html(dep_pre+dep_core+dep_last);
			$('.nav-stacked li').removeClass();
			$(this).parent().addClass('active');
			fwzna_listen();
			$('#listwork').html('');//清空下面
			$('.pagination').html('');
		}
	);


	 /****************************************************/
	$('#pub').click(
		function(){
			$('.fwzn_special').html(pub_pre+pub_core+pub_last);
			$('.nav-stacked li').removeClass();
			$(this).parent().addClass('active');
			fwzna_listen();
			$('#listwork').html('');//清空下面
			$('.pagination').html('');
		}
	);
	 /****************************************************/


	$('#work').click(
		function(){
		$('.fwzn_special').html(work_pre+work_core+work_last);
		$('.nav-stacked li').removeClass();
		$(this).parent().addClass('active');
		fwzna_listen();
		$('#listwork').html('');//清空下面
		$('.pagination').html('');
		}
	);

	$('#hot').click(
		function(){
		$('.fwzn_special').html('');
		var firstajax ={page:1,cateId:0,depId:0,is_hot:1,key:''};
		ajax_drive(firstajax);
		$('.nav-stacked li').removeClass();
		$(this).parent().addClass('active');

		}
	);
	$('#all').click(
		function(){
		$('.fwzn_special').html('');
		var firstajax ={page:1,cateId:0,depId:0,is_hot:0,key:''};
		ajax_drive(firstajax);
		$('.nav-stacked li').removeClass();
		$(this).parent().addClass('active');
		}
	);
}

//监听col-800处 fwzn下的点击
function fwzna_listen(){
	$('.fwzn_special div').click(
			function(){
			$('.fwzn_special div').removeClass('active');
			$(this).addClass('active');
			var data_ajax ={page:1,cateId:0,depId:0,is_hot:0,key:''};
			if($(this).attr('id')[0]=='d')data_ajax.depId=parseInt($(this).attr('id').substr(4));
			if($(this).attr('id')[0]=='w')data_ajax.cateId=parseInt($(this).attr('id').substr(4));
			 /****************************************************/
			// f($(this).attr('id')[0]=='p')data_ajax.pubId=parseInt($(this).attr('id').substr(4));
			 /****************************************************/
			ajax_drive(data_ajax);
		});
}

//页面初始化 默认加载
var firstajax ={page:1,cateId:0,depId:0,is_hot:1,key:''};
ajax_drive(firstajax);
$('.fwzn_special').css('padding','0px');
});
