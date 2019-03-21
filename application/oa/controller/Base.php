<?php
namespace app\oa\controller;
use think\Controller;
use think\Db;

/**
 * 自定义控制器基础类
 * 实现查询左侧菜单数据
 * @author zhy
 * @date 2018-10-31
 */
class Base extends Controller
{
	
	public function _initialize()
	{
		//判断登录功能
		$userinfo = session('userinfo');
		// if (empty($userinfo)) {
		// 	$this->error("请登录","login/index");
		// }
		//根据用户表的用户组id找到用户组表的权限信息
		$groupinfo  = model("groups")->getOne(['id'=>$userinfo['group_id']],"permission");


		//获取所有左侧的显示的权限规则
		
		$condition = ['is_show'=>1,'status'=>1];

		//允许访问的控制器与方法(权限表中的url字段)
		$allow_action = array();
		//当前访问的控制器名和方法名
		$now_action = request()->controller().'/'.request()->action();
		//不是系统管理员组的用户并且权限不为空的加上查询条件,
		//根据登录用户的用户组显示已分配的左侧权限规则
		if ($userinfo['group_id'] != 1 && !empty($groupinfo['permission'])) {
			$condition['id'] = ['in',$groupinfo['permission']];
			// $allow_action  = model("permission")->getAll(['id'=>$condition['id']],'address');//结果是个二维数组
			$allow_action  = model("permission")->where(['id'=>$condition['id']])->column('address');//结果是一维数组
			array_push($allow_action,'Index/index','My/index',"Login/index");
			// 判断当前访问的控制器是否在允许访问的范围
			if(!in_array($now_action, $allow_action)){
				$this->error("没有访问权限......","index/index");
			}
		}
	

		$siderbar = model('permission')->getAll($condition,"*");
		// echo \think\Db::getLastSql();die;
		$newTree = ruleTree($siderbar);
		$this->assign('tree',$newTree);
		
	}
}
?>