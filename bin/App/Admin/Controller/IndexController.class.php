<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController  {
    
    public function index(){

    	$this->display();
    }

    public function main() {
    	$this->display();
    }

    /**
     * 退出登入
     *
     */
	public function loginquit(){
        session('adminuser',null);
        $this->redirect('Login/index');
    }
}
