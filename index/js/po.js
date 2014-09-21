$(function(){

  /*选择详情个数*/
  $('#poSelect').change(function(){
    var cur = $("#poSelect option:selected").text();
    location.href = "?r=po/create&n="+cur;
  });

  /*上传Excel*/
  $('#xlsfile').change(function(){
    var filename = $('#xlsfile').val();
    var fileType = filename.substr(filename.indexOf('.')+1);
    if(fileType != 'xls')
    {
      alert("The file is not correct!");
      return;
    }
    $('#fileform').submit();
  });

  /*添加随附资料*/
  $('#add1').click(function(){
    var fa = $(this).parent().children('div');
    var path = $('#path1').val();
    if(path == '')
      alert('没有选择文件');
    else
    {
      fa.append("<div><p style='display:inline'>"+path+"</p>&nbsp;&nbsp;<a href='' class='delete1' onclick='return false;'>删除</a><br/></div>");
      $('#path1').val('');
    }
  });

  /*删除随附资料*/
  $('.delete1').live('click',function(){
    var fa = $(this).parent();
    fa.remove();
  });

  /*创建 po 之前处理多文件逻辑*/
  $('#submit1').click(function(){
    var field = $('#pathfield').children('div');
    var datapath = $('#datapath');
    field.each(function(){
      var url = $(this).children().eq(0).text();
      var last = datapath.val();
      if(last == '') datapath.val(url);
      else datapath.val(last + ';' + url);
      var cur = datapath.val();
    });
    return true;
  });

});
