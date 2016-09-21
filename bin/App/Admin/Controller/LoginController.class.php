<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class LoginController extends Controller {

    public function index(){

    	return $this->display();
    }
    public function login(){
        $user = I('post.user',null,htmlspecialchars);
        $pass = I('post.pass',null,'md5');
        $srcode = I('post.srcode','',htmlspecialchars);
        $data = D('Admin')->getAdminByUsername($user);
        if(!$data){
            $this->ajaxReturn(array('status'=>1,'content'=>'','msg'=>'亲，用户名不存在！'));
        }elseif($data['password'] != getMd5Password($pass)){
            $this->ajaxReturn(array('status'=>2,'content'=>'','msg'=>'亲，密码错误！'));
        }else if(!check_verify($srcode)){
            $this->ajaxReturn(array('status'=>3,'content'=>'','msg'=>'亲，验证码错误！'));
        }
        session('adminuser',$data,2592000);//30天
        $session_id = session_id();
        setcookie("PHPSESSID",$session_id , time()+3600*24*30,'/');
        $this->ajaxReturn(array('status'=>0,'content'=>'登入成功'));

    }
    //验证码
    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 18;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->codeSet = '0123456789';
        $Verify->imageW = 130;
        $Verify->imageH = 35;
        //$Verify->expire = 600;
        $Verify->entry();
    }
}


