<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class MenuController extends CommonController {
    /**
     * 菜单首页
     */
    public function index(){
        $data = array();
        //分页操作逻辑
        $page = isset($_GET['p']) && !empty($_GET['p']) ? $_GET['p'] + 0 : 1;
        $pageSize = isset($_GET['pageSize']) && !empty($_GET['pageSize']) ? $_GET['pageSize'] : 10;
        $menus = D('Menu')->getMenuCount($data,$page,$pageSize);
        $menusCount = D('Menu')->getMenusCount($data);
        $res = new \Think\Page($menusCount,$pageSize);
        $pageres = $res->show();
        $this->assign('pageres',$pageres);
        $this->display();
    }

    /**
     * 添加模块
     */
    public  function  add(){
      $this->display();

    }

    /**
     * ajax提交菜单数据
     */
    public function increase(){
        $data['name']  = I('post.name',null,htmlspecialchars);
        $data['type']  = I('post.type',null,htmlspecialchars);
        $data['module']  = I('post.module',null,htmlspecialchars);
        $data['controller']  = I('post.controller',null,htmlspecialchars);
        $data['method']  = I('post.method',null,htmlspecialchars);
        $data['status']  = I('post.status',null,htmlspecialchars);
        if($data){
            if(!isset($data['name']) || !$data['name']) {
                $this->ajaxReturn(array('msg'=>'1','text'=>'菜单名不能为空'));
            }else if(!isset($data['module']) || !$data['module']) {
                $this->ajaxReturn(array('msg'=>'1','text'=>'模块名不能为空'));
            }else if(!isset($data['controller']) || !$data['controller']) {
                $this->ajaxReturn(array('msg'=>'1','text'=>'控制器名不能为空'));
            }else if(!isset($data['method']) || !$data['method']) {
                $this->ajaxReturn(array('msg'=>'1','text'=>'方法名不能为空'));
            }
            $menuId =  D('Menu')->insert($data);
            if($menuId){
                $this->ajaxReturn(array('msg'=>'0','text'=>'新增成功','content'=>$menuId));
            }else{
                $this->ajaxReturn(array('msg'=>'1','text'=>'新增失败'));
            }
        }
    }
}


