$(function(){

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
