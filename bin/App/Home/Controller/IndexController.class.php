<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

    	$data = M('Admin')->where(array('status'=>1))->select();
    	$this->display();
    }
    public function aaa(){
        echo 2;die;
    }
}