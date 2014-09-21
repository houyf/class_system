//搜索 组织机构 发送ajax
function ajax_drive_dep(obj){
$.get('index.php?r=site/ajaxDep',obj,function(data){
		var depList;
		if (data.depList)depList=data.depList;
		$('.list-group').html('');//初始化ul
		for(var i=0;i<depList.length;i++)
		{
			var a=$('<a>');
			var h4=$('<h4>');
			h4.html(depList[i].dep_name);
			h4.addClass('list-group-item-heading');

			var p=$('<p>');
			p.html(depList[i].dep_detail);
			p.addClass('list-group-item-text');

			a.attr('href','index.php?r=site/dd&i='+depList[i]['dep_id']);
			a.attr('target','_blank');
			a.html(h4);
			a.append(p);
			a.addClass("list-group-item");

			$('.list-group').append(a);
		}
		pagelist(data.depPageCount,obj.page);
		$('#topDep').remove();			//remove zzb's div
		$('#topWork').remove();

	},'json',false);
}

//搜索 服务指南发送ajax
function ajax_drive_work(obj){
$.get('index.php?r=site/ajaxWork',obj,function(data){
		//topDep
		if(data.topDep){
			var a=$('<a>');
			var h4=$('<h4>');
			h4.html(data.topDep.dep_name);
			h4.addClass('list-group-item-heading');

			var p=$('<p>');
			p.html(data.topDep.dep_detail);
			p.addClass('list-group-item-text');

			a.attr('href','index.php?r=site/dd&i='+data.topDep.dep_id);
			a.attr('target','_blank');
			a.html(h4);
			a.append(p);
			a.addClass("list-group-item");

			$('#topDep').html(a);
		}
		else
			$('#topDep').remove();

		//topDep
		if(data.topWork)
		{
			var a=$('<a>');
			var h4=$('<h4>');
			h4.html(data.topWork.work_name);
			h4.addClass('list-group-item-heading');

			var p=$('<p>');
			p.html(data.topWork.work_detail);
			p.addClass('list-group-item-text');

			a.attr('href','index.php?r=site/wd&i='+data.topWork.work_id);
			a.attr('target','_blank');
			a.html(h4);
			a.append(p);
			a.addClass("list-group-item");

			$('#topWork').html(a);
		}
		else
			$('#topWork').remove();
		//事务列表
		var workList;
		if (data.workList)
			workList=data.workList;
		$('.list_group').html('');//xxx初始化ul
		for(var i=0;i<workList.length;i++)
		{
			var a=$('<a>');
			var h4=$('<h4>');
			h4.html(workList[i].work_name);
			h4.addClass('list-group-item-heading');

			var p=$('<p>');
			p.html(workList[i].work_detail);
			p.addClass('list-group-item-text');

			a.attr('href','index.php?r=site/wd&i='+workList[i]['work_id']);
			a.attr('target','_blank');
			a.html(h4);
			a.append(p);
			a.addClass("list-group-item");

			$('.list_group').append(a);
		}
		pagelist(data.workPageCount,obj.page);

	},'json',false);
}

function ajax_drive_news(obj){
$.get('index.php?r=site/ajaxNews',obj,function(data){
		var newsList;
		if (data.newsList)newsList=data.newsList;
		$('.list-group').html('');//初始化ul
		for(var i=0;i<newsList.length;i++)
		{
			var a=$('<a>');
			var h4=$('<h4>');
			h4.html(newsList[i].news_name);
			h4.addClass('list-group-item-heading');

			var p=$('<p>');
			p.html(newsList[i].news_detail);
			p.addClass('list-group-item-text');

			a.attr('href','index.php?r=site/nd&i='+newsList[i]['news_id']);
			a.attr('target','_blank');
			a.html(h4);
			a.append(p);
			a.addClass("list-group-item");

			$('.list-group').append(a);
		}
		pagelist(data.newsPageCount,obj.page);
		$('#topDep').remove();			//remove zzb's div
		$('#topWork').remove();

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
			if($('ul').hasClass('pagination'))//存在就替换
			$('.pagination').parent().html(ul);
			else
			$('.content').append(div);//不存在就添加
		}
		else
			if($('ul').hasClass('pagination'))
			$('.pagination').parent().html('');

		//加载分页 END
		activepagelist(count)//激活分页绑定

		$('html,body').animate({scrollTop: '100px'}, 200);
}

if(cate==1){
	var firstajax ={page:1,cateId:0,depId:0,is_hot:0,key:data};
	ajax_drive_work(firstajax);
}
if(cate==2){
	var firstajax ={page:1,key:data};
	ajax_drive_dep(firstajax);
}
if(cate==3){
	var firstajax ={page:1,cateId:0,key:data};
	ajax_drive_news(firstajax);
}


//监听分页被点击
function activepagelist(count){
	$('.pagination li a').click(function(){
		var temp=$(this).text();
		if($(this).text()=='«')temp=parseInt($('.pagination .active a').text())-1;

		if($(this).text()=='»')temp=parseInt($('.pagination .active a').text())+1;

		if($(this).text()=='首页')temp=1;
		if($(this).text()=='末页')temp=count;
	//发送ajax
		if(cate==1){
		var ajax_data ={page:temp,cateId:0,depId:0,is_hot:0,key:data};
		ajax_drive_work(ajax_data);
		}
		if(cate==2){
			var ajax_data ={page:temp,key:data};
			ajax_drive_dep(ajax_data);
		}
		if(cate==3){
			var ajax_data ={page:temp,cateId:0,key:data};
			ajax_drive_news(ajax_data);
		}

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
