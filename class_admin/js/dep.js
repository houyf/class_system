
//全部部门
function ajax_drive(obj){
$.get('index.php?r=site/ajaxDep',obj,function(data){
		var depList;
		if (data.depList)depList=data.depList;
		$('#listdep').html('');//初始化ul
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

			$('#listdep').append(a);
		}
		pagelist(data.depPageCount,obj.page);

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
			$('#listdep').parent().append(div);
		}
		else
			if($('ul').hasClass('pagination'))
			$('.pagination').parent().html('');

		//加载分页 END
		activepagelist(count)//激活分页绑定

		// $('html,body').animate({scrollTop: '100px'}, 200);
		$('#nav3').parent().css('background','#189e7e');

}

var firstajax ={page:1,key:''};
ajax_drive(firstajax);



//监听分页被点击
function activepagelist(count){
	$('.pagination li a').click(function(){
		var temp=$(this).text();
		if($(this).text()=='«')temp=parseInt($('.pagination .active a').text())-1;

		if($(this).text()=='»')temp=parseInt($('.pagination .active a').text())+1;

		if($(this).text()=='首页')temp=1;
		if($(this).text()=='末页')temp=count;


		var data_ajax ={page:temp,key:''};
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
