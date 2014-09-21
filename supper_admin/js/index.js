
//fasthot
function  cre_div(arr,str,id,name){

	var div = $('<div>');
	var table = $('<table>');
	tbody2 = $('<tbody>');
	table.addClass('table');
	tbody2.attr('id','tbody');
	div.addClass('child');
	var tr = $('<tr>');
	for(var i = 0;i<arr.length;i++){
		var td = $('<td>');
		var div1 = $('<div>');
		if(arr[i][name]=='东校区房地产管理科')arr[i][name] = '房管科';
		if(arr[i][name]=='东校区教学实验中心')arr[i][name] = '教学实验中心';
		div1.text(arr[i][name]);
		div1.attr('onclick',"window.open(\'"+str+arr[i][id]+"\')");
//		alert("\'window.open(\\'"+str+arr[i][id]+"\\')\'");
		td.html(div1);
		tr.append(td);
//		hot_core += '<td><div class="square" onclick="window.open(\'index.php?r=site/wd&i='+hotwork_json[i]['work_id']+'\')">'+hotwork_json[i]['wf_name']+'</div></td>';
		if( (i+1)%3==0){
			tbody2.append(tr);

			tr = $('<tr>');
		}else{
			if(i==arr.length-1){
				tbody2.append(tr);

				tr = $('<tr>');
			}
		}
	}
	table.html(tbody2);
	tbody2=undefined;
	div.html(table);
	return div;
}

function active_bind(){

	$('.toggle').click(
		function(){
			$('li').removeClass('active');
			$(this).addClass('active');
			}
	);

	$('#fast').click(
		function(){
			$('#fwzn').html('');
			len = hotwork_json.length;
			remain = len % 12;
			div_fast = Math.floor(len/12);  //12的个数
			for(var i=0; i<=div_fast-1;i++){				//zheng
				var arr = new Array(),i1=0;
				for(var j = i*12; j<i*12 + 12;j++){
					arr[i1] = hotwork_json[j];
					i1++;
				}
				$('#fwzn').append(cre_div(arr,'index.php?r=site/wd&i=','work_id','wf_name'));
			}
													//leave out
			if(remain>0){
				i1=0;
				var arr = new Array()

				for(var i = div_fast*12;i< div_fast*12+remain;i++){
					arr[i1] = hotwork_json[i];
					i1++;
				}
				$('#fwzn').append(cre_div(arr,'index.php?r=site/wd&i=','work_id','wf_name'));
			}
			$(".slider-col a").attr("id","kuai");
			$('#fwzn').css('margin-left', 0);
			$('.sliderNav .nivo-controlNav').html('');
			for(var i=1;i<=div_fast + 1;i++){
				var a = $('<a>');
				a.addClass('nivo-control');
				if(i==1)a.addClass('active');
				$('.sliderNav .nivo-controlNav').append(a);
			}

		}
	);

	$('#dep').click(
		function(){
			$('#fwzn').html('');
			len = dep_json.length;
			remain = len % 12;
			div_dep = Math.floor(len/12);  //12的个数
			for(var i=0; i<=div_dep-1;i++){				//zheng
				var arr = new Array(),i1=0;
				for(var j = i*12; j<i*12 + 12;j++){
					arr[i1] = dep_json[j];
					i1++;
				}
				$('#fwzn').append(cre_div(arr,'index.php?r=site/work&a=z&id=','dep_id','dep_name'));
			}
													//leave out
			if(remain>0){
				i1=0;
				var arr = new Array()
				for(var i = div_dep*12;i< div_dep*12+remain;i++){
					arr[i1] = dep_json[i];
					i1++;
				}
				$('#fwzn').append(cre_div(arr,'index.php?r=site/work&a=z&id=','dep_id','dep_name'));
			}
			$(".slider-col a").attr("id","zu");
			$('#fwzn').css('margin-left', 0);
			$('.sliderNav .nivo-controlNav').html('');
			for(var i=1;i<=div_dep + 1;i++){
				var a = $('<a>');
				a.addClass('nivo-control');
				a.attr("id", "con"+i);
				if(i==1)a.addClass('active');
				$('.sliderNav .nivo-controlNav').append(a);
			}
			nivo_ready();
		}
	);

	$('#work').click(
		function(){
			$('#fwzn').html('');
			len = workcate_json.length;
			remain = len % 12;
			div_work = Math.floor(len/12);  //12的个数
			for(var i=0; i<=div_work-1;i++){				//zheng
				var arr = new Array(),i1=0;
				for(var j = i*12; j<i*12 + 12;j++){
					arr[i1] = workcate_json[j];
					i1++;
				}
				$('#fwzn').append(cre_div(arr,'index.php?r=site/work&a=s&id=','wc_id','wc_name'));
			}
													//leave out
			if(remain>0){
				i1=0;
				var arr = new Array()
				for(var i = div_work*12;i< div_work*12+remain;i++){
					arr[i1] = workcate_json[i];
					i1++;
				}
				$('#fwzn').append(cre_div(arr,'index.php?r=site/work&a=s&id=','wc_id','wc_name'));
			}
			$(".slider-col a").attr("id","shi");
			$('#fwzn').css('margin-left', 0);
			$('.sliderNav .nivo-controlNav').html('');
			for(var i=1;i<=div_work + 1;i++){
				var a = $('<a>');
				a.addClass('nivo-control');
				if(i==1)a.addClass('active');
				$('.sliderNav .nivo-controlNav').append(a);
			}
		}
	);

	$('.nextNav').click(
		function(){
			var id = $(this).attr('id');
			if(id=="kuai")div = div_fast;
			if(id=="zu")div = div_dep;
			if(id=="shi")div = div_work;
			curr_left = parseInt( $('#fwzn').css('margin-left').replace("px",""));
			if (Math.abs(curr_left) < div*328){
				var marl = curr_left-328;
				var st = {marginLeft:marl+"px"};
				$("#fwzn").animate(st);
			}
			else{
				var marl = 0;
				var st = {marginLeft:marl+"px"};
				$("#fwzn").animate(st);
			}

			//bottom point
			$('.sliderNav a.active').addClass('nextx');
			$('.sliderNav .nextx').removeClass('active');
			if($('.sliderNav a.nextx').next().length==0){
				var a = $('.sliderNav .nivo-controlNav').children()[0];
				$(a).addClass('active');
			}
			else{
				$('.sliderNav .nextx').next().addClass('active');
			}
			$('.sliderNav a.nextx').removeClass('nextx');
		}
	)
	$('.prevNav').click(
		function(){
			var id = $(this).attr('id');
			if(id=="kuai")div = div_fast;
			if(id=="zu")div = div_dep;
			if(id=="shi")div = div_work;
			curr_left = parseInt( $('#fwzn').css('margin-left').replace("px",""));
			if (Math.abs(curr_left) >0){
				var marl = curr_left+328;
				var st = {marginLeft:marl+"px"};
				$("#fwzn").animate(st);
			}
			else{
				var marl = curr_left - 328*div;
				var st = {marginLeft:marl+"px"};
				$("#fwzn").animate(st);   // 轮回
			}

			//bottom point
			$('.sliderNav a.active').addClass('nextx');
			$('.sliderNav .nextx').removeClass('active');
			if($('.sliderNav a.nextx').prev().length == 0){
				var a_len = $('.sliderNav .nivo-controlNav').children().length;
				var a = $('.sliderNav .nivo-controlNav').children()[a_len - 1];
				$(a).addClass('active');
			}
			else{
				$('.sliderNav .nextx').prev().addClass('active');
			}
			$('.sliderNav a.nextx').removeClass('nextx');
		}
	)

$('#nav1').parent().css('background','#189e7e');
}

$(function(){
		active_bind()
});
// 猪鼻子点击绑定  模拟点击
function nivo_ready(){
	$("a.nivo-control").click(function(){
			var id = $(this).attr("id");
			var id_curr = $('.col-xs-4 .nivo-controlNav .active').attr("id");
			var num = parseInt( id.substr(3));
			var num_curr = parseInt( id_curr.substr(3));
			num = num - num_curr;
			for(var  i = 1;i<=Math.abs(num);i++){
				if(num>0)$(".col-xs-4 .slider-col .nextNav").click();
				else $(".col-xs-4 .slider-col .prevNav").click();
			}
		})
}
