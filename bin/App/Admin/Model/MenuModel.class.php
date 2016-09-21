<?php
/**
 * User: bin
 * Date: 2016/9/18
 * Time: 22:05
 */
namespace Common\Model;
use Think\Model;

class MenuModel extends Model  {
    private $_db = '';

    public function __construct(){
        $this->_db = M('menu');
    }

    /**
     * 添加菜单
     * @param array $data  数据
     * @return int|mixed
     */
    public  function  insert($data = array()){
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }

    /**
     * 获取相应条数数据
     * @param $data
     * @param $page
     * @param $pageSize
     */
    public  function  getMenus($data,$page,$pageSize =10){
        $data['status'] = array('neq',-1);
        $offset =  ($page -1) * $pageSize;
        $info = $this->_db->where($data)->order('menu_id desc')->limit($offset,$pageSize)->select();
        return $info;
    }

    /**
     * 获取相应数据总数
     * @param array $data
     * @return mixed
     */
    public function getMenusCount($data = array()){
        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();
    }
}