$(function(){
  $('#transportSelect').change(function(){
    var cur = $("#transportSelect option:selected").text();
    location.href = "?r=transport/create&n="+cur;
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
