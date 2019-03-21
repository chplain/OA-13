<?php
namespace app\oa\controller;
use think\Controller;
use think\Db;
/**
 * 用户组管理类
 * 实现添加,修改
 * @author zhy
 * @date 2018-10-31
 */
class Group extends Base
{
	//用户组列表
	public function index(){
		$this->assign('data',$group = Db::name('groups')->paginate(2));
		return view();
	}
	//用户组添加
	public function add(){
		if(request()->isGet()){
			$permission = model('permission')->getAll(["status" => 1]);
			$prem = ruleTree($permission);
			$this->assign('prem',$prem);
			return $this->fetch('add');
		}elseif (request()->isPost()) {
			$param = input('post.');
			//存入数据库的字段
			$data = array(
				'group_name' => $param['name'],
				'permission'=>implode($param['permission'],","),
				'status' => $param['status'],
			);
			$result = $this->validate($data,"group");
			if($result !== true){
				$this->error($result);
			}
			$res = model('groups')->insert($data);
			if($res){
				$this->success("添加成功",'index');
			}else{
				$this->error("添加失败");
			}
		}
		
	}
	//用户组修改
	public function edit($id){
		if(!isset($id) || empty($id)){
			$this->error("参数错误");
		}
		if(request()->isGet()){
			$info = model('groups')->getOne(['id'=>$id]);
			$info['permission'] = explode(",", $info["permission"]);
			$this->assign('info',$info);
			$permission = model('permission')->getALL(["status" => 1]);
			foreach ($permission as $key => $value) {
				if(in_array($value['id'],$info['permission'])){
					$permission[$key]['is_checked'] = "checked";
				}else{
					$permission[$key]['is_checked'] = "";
				}
			}
			$prem = ruleTree($permission);
			// dump($prem);die;
			$this->assign('prem',$prem);
			return $this->fetch('edit');
		}elseif (request()->isPost()) {
			$param = input('post.');
			//存入数据库的字段
			$data = array(
				'group_name' => $param['name'],
				'permission'=>implode($param['permission'],","),
				'status' => $param['status'],
			);
			$result = $this->validate($data,"group");
			if($result !== true){
				$this->error($result);
			}
			$res = model('groups')->getUpdate(["id"=>$id],$data);
			if($res){
				$this->success("修改成功",'index');
			}else{
				$this->error("修改失败");
			}
		}
		
	}

	public function del(){
		$id = input('groupid',0);
		if(!isset($id) || empty($id)){
			$this->error("参数错误");
		}
		$res = model('groups')->getDelete(['id'=>$id]);
		if($res){
			$this->success("删除成功","index");
		}else{
			$this->error("删除失败");
		}
	}

}