<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/16
 * Time: 20:42
 */
/**
 * 自定义一些常见的方法
 */

/**
 * 设置当前页面的编码
 * param string $code 当前网页的编码，默认是urf8;
 */
function BM($code='utf-8'){
    header("Content-type:text/html;charset=".$code);
}

/**打印变量
 * @param null $param
 * @param null $type 不为空就连类型一起打印输出
 */
function p($param=null,$type=null) {
    BM();
    echo '<pre>';
    if(empty($type)){
        print_r($param);
    }else{
        var_dump($param);
    }
    echo '</pre>';
}
/** 
 *  
 * 验证码生成 
 */
function check_verify($code, $id = ""){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

/**
 *
 * 密码MD5加密
 */
function getMd5Password($password){
    return md5($password.C('MD5_BIN'));
}

/**
 *   Cookie 设置、获取、删除
*/

