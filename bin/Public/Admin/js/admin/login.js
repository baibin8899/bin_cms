/**
 *登录业务处理
 **/
var login = {
    login_cheke :function () {
        //获取登录信息
        var user = $('input[name="name"]').val();
        var pass = $('input[name="pass"]').val();
        var srcode = $('input[name="sr_code"]').val();
        var url   = SCOPE.lourl;
        var adurl = SCOPE.aurl;
        var data = {user:user,pass:pass,srcode:srcode}
        if(!user){
            buglog.error('用户名不能为空');
            return false;
        }else if(!pass){
            buglog.error('密码不能为空');
            return false;
        }else if(!srcode){
            buglog.error('验证码不能为空');
            return false;
        }
        $.post(url,data,function (result) {
            if(result.status =='1'){
               buglog.error(result.msg);
            }else if(result.status =='2'){
                buglog.error(result.msg);
            }else if(result.status =='3'){
                buglog.error(result.msg);
            }else if(result.status=='0'){
                buglog.confirm(result.content,adurl);
            }
        },'JSON')

    }
}