<?php 
namespace app\oa\controller;
use think\Controller;
use think\Db;
/**
 * 权限规则控制器类
 * 权限规则添加,修改,删除
 * @author zhy
 * @date 2018-10-30
 */
class Rule extends Base
{
	//权限规则列表页面
	public function index()
	{
		$permission = model('permission')->getAll();
		//使用递归函数生成权限层级关系
		$newPerm = getRuleLevel($permission);
		// $pager = $newPerm->render();
		// $this->assign('pager',$pager);
		$this->assign('data',$newPerm);
		return $this->fetch('index');
	}
	//权限规则添加页面
	public function add(){
		if(request()->isGet()){
			// $permission = model('permission')->where('status = 1')->field('id,pid,per_name')->select();
			$permission = model('permission')->getAll('status = 1','id,pid,per_name');
			$newPerm = getRuleLevel($permission);
			$this->assign('data',$newPerm);
			return $this->fetch('add');
		}elseif(request()->isPost()){
			// dump(input('post.'));
			// 验证数据
			$data = input('post.');
			// $data['pid']='';
			$result=$this->validate($data,'rule');
			// dump($result);
			if($result !== true){
				$this->error($result);
			}
			$res = model('permission')->insert($data);
			// dump($res);
			if($res){
				$this->success("添加成功","index");
			}else{
				$this->error('添加失败');
			}
		}
	}

	//权限规则修改页面
	public function edit($id){

		if(!isset($id) || empty($id)){
			$this->error("参数错误");
		}
		if(request()->isGet()){
			$info = model('permission')->getOne(['id'=>$id]);
			$this->assign('info',$info);
			$permission = model('permission')->getAll('status = 1','id,pid,per_name');
			$newPerm = getRuleLevel($permission);
			$this->assign('data',$newPerm);
			return $this->fetch('edit');
		}elseif (request()->isPost()) {
			$data = input('post.');
			// $data['pid']='';
			$result=$this->validate($data,'rule');
			// dump($result);
			if($result !== true){
				$this->error($result);
			}
			$res = model('permission')->getUpdate(['id'=>$id],$data);
			// dump($res);
			if($res){
				$this->success("修改成功","index");
			}else{
				$this->error('修改失败');
			}
			
		}
		
	}
	//权限规则删除页面
	public function del($id){
		
		if(!isset($id) || empty($id)){
			$this->error("参数错误");
		}
		$ret = model('permission')->getDelete(['id'=>$id]);
		if($ret == false){
			$this->error("删除失败");
		}else{
			$this->success("删除成功");
		}
	}
}