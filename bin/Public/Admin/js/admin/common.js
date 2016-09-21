/**
 * Created by Administrator on 2016/9/17.
 */
/**
 *  添加按钮
 */
$('#button-add').click(function () {
    var url = SCOPE.add_url;
    window.location.href=(url);
})
/**
 * 提交数据
 */
$('#singcms-button-submit').click(function () {
    //用serializeArray 方法获取 form 下面的数据
    var data = $('#singcms-form').serializeArray();
    postData = {};
    //解析数据
    $(data ).each(function (i) {
        postData[this.name] = this.value;
    })
    //把获取到的数据 用ajax提交到php后台
    var url = SCOPE.save_url;
    var jump_url = SCOPE.jump_url;
    $.post(url,postData,function (result) {
        if(result.msg == 1){
            buglog.error(result.text);
        }else if(result.msg == 0){
            buglog.success(result.text,jump_url)
        }
    })
})