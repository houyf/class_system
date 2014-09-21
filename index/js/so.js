$(function(){
  $('#soSelect').change(function(){
    var cur = $("#soSelect option:selected").text();
    location.href = "?r=SellOrder/create&n="+cur;
  });

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
});
