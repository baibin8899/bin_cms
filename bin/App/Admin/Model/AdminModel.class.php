<?php
/**
 * User: bin
 * Date: 2016/9/18
 * Time: 22:05
 */
namespace Common\Model;
use Think\Model;

class AdminModel extends Model  {
    private $_bd = '';

    public function __construct(){
        $this->_bd = M('admin');
    }
    //查询用户信息
    public function  getAdminByUsername($username){
        $ret = $this->_bd->where(array('username'=>$username))->find();
        return $ret;
    }

}