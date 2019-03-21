<?php    
/**
*oa首页控制类,展示首页内容
*@author zhy
*@date 2018-10-30
 */        
namespace app\oa\controller;
use think\Controller;
class Index extends Base
{       
    public function index()
    {
    	$userinfo =session('userinfo');
        return $this->fetch('./index');
    }    
}

