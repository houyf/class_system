
$(function(){

  /*输入框进行监听 keyup 事件 */
  $('#_search').live('keyup',function(){
    var text = $(this).val();

    if(text == "") return false;

    /*后台请求数据*/
    $.get("?r=company/search_name",{
      input: text
    },function(data,textStatus){

      /*清空原有 div */
      $('#_box').remove();

      /*定义固定 jquery 对象*/
      var $box = $("<div id = '_box'></div>");
      var $table = $('<table id = "search"></table>');
      var $th = $('<tr><th class="t_id">ID </th><th class="t_name">Name</th></tr>')
      $table.append($th);

      /*记录查询是否为空*/
      var is_empty = true;

      /*对查询到的每条记录*/
      $.each(data.company,function(index,item){

        is_empty = false;

        var $tr = $('<tr><td class="t_id"><a href="" >'+item.id+ "</a></td><td class='t_name'><a href=''>"+item.name+"</a></td></tr>");
        $table.append($tr);

      });

      /*若为空增加提示*/
      if(is_empty){
        var $tr = $('<tr><td colspan="2">Nothing</td></tr>');
        $table.append($tr);
      }

      /*添加对象到 html */
      $box.append($table);
      $("body").append($box);

      /*获得输入框位置*/
      var offset = $('#_search').offset();
      offset.top += 30;

      /*设置简单 css 并进行显示*/
      $('#_box').css({
        'position':'absolute',
        'width':'400px',
        'top':offset.top +'px',
        'left':offset.left + 'px',
      });

      $('#_box').addClass('box').show('fast');

    },'json');

  });

  $('td[class=t_id]').live('click',function(){
    $id = $(this).parent().children('.t_id');
    $name = $(this).parent().children('.t_name');
    select = $("#_hide").val();
    $selector = $("#" + select);
    if($selector.length > 0)
      $selector.val($id.text());
    else alert("下拉菜单选择器 ID 错误");
    $('#_search').val($name.text());
    /*清空弹出 div */
    $('#_box').remove();
    return false;
  });

  $('td[class=t_name]').live('click',function(){
    $id = $(this).parent().children('.t_id');
    $name = $(this).parent().children('.t_name');
    select = $("#_hide").val();
    $selector = $("#" + select);
    if($selector.length > 0)
      $selector.val($id.text());
    else alert("下拉菜单选择器 ID 错误");
    $('#_search').val($name.text());
    /*清空弹出 div */
    $('#_box').remove();
    return false;
  });

});


