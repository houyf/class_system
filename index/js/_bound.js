
$(function(){

  /*按钮进行监听 click 事件 */
  $('.modify').live('click',function(){

    var is_sure = confirm('您是否确认修改');
    if(!is_sure) return;

    var text = $(this).parent().children('.bound_class').val();
    var $father = $(this).parent().parent().parent();
    var item_id = $father.children(':nth-child(3)').text();

    //var item_id = $(this).parent().parent().parent().children(':nth-child(3)').html();

    if(text == ""){
      alert('预警值不可为空');
      return;
    }

    var reg = /^[0-9]*$/;
    if(!reg.test(text)){
      alert('请填入数字');
      return;
    }

    if(text.length > 5){
      alert('您输入的数字太大!');
      return ;
    }

    /*后台请求数据*/
    $.get("?r=item/modifyBound",{
      bound: text,
      item:item_id
    },function(data,textStatus){

      if(textStatus != 'success'){
        alert('请检查网络!');
        return;
      }

      if(data.success == 0){
        alert(data.errmsg);
        alert('修改不成功！请重新再试!');
        return ;
      }

      alert('您的修改已成功！');


      var $cur_num = $father.children(':nth-child(5)');
      var num = parseInt($cur_num.text());
      var warn = parseInt(text);
      if(num <= warn)
        $cur_num.css('background','red');
      else
        $cur_num.css('background','');

    },'json');

  });


});


