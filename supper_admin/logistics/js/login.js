        $(function() {
                $('#showPassword').click(function() {
                    if ($("#showPassword").is(":checked")) {
                        $('.icon-lock').addClass('icon-unlock');
                        $('.icon-unlock').removeClass('icon-lock');
                    } else {
                        $('.icon-unlock').addClass('icon-lock');
                        $('.icon-lock').removeClass('icon-unlock');
                    }
                });
                $(document).keydown(function(enent){
                     if(event.keyCode==13){
                          tryLogin();
                     }    
                });
                $("#login_btn").click(function() {
                    tryLogin();
                });
                function tryLogin()
                {
                    var username = $("#username").val();
                    var userpsw = $("#userpsw").val();
                    if(username.length == 0 || userpsw.length == 0)
                    {
                        $(".log-in-tips").html("用户名或密码不能为空!");
                        setTimeout('$(".log-in-tips").html("")', 1500);
                        return false;
                    }
                    $.post("__URL__/checkLogin",{"username":username, "userpsw":userpsw},function(o){
                        if(o.toString() == "0")
                        {
                            $(".log-in-tips").html("用户名或密码错误!");
                            setTimeout('$(".log-in-tips").html("")', 1500);
                        }
                        else
                        {
                            location.href = "../../admin.php";   
                        }
                    },"text");
                }
            });
