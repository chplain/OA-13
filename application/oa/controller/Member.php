<?php
/**
 * 用户管理类
 * 实现添加,修改,排序,搜索
 * @author zhy
 * @date 2018-10-31
 */
namespace app\oa\controller;
use think\Controller;
use think\Db;
class Member extends Base
{
	
	public function index()
	{
		$group = Db::name("groups")->column('id,group_name');
		$this->assign('group',$group);
		$member = model("member")->getAll([],'*');
		$pager = $member->render();
		// dump($group);
		// dump($member);die;
		$this->assign('pager',$pager);
		$this->assign('data',$member);
		return $this->fetch();
	}
	public function add()
	{
		if(request()->isGet()){
			$members = Db::name("member")->field("id,member_name")->select();
			$this->assign("members",$members);
			$groups = model("groups")->getAll(['status'=>1],'id,group_name');
			$this->assign('groups',$groups);
			return $this->fetch();
		}elseif (request()->isPost()) {
			// dump(input('post.'));
			$getdata = input('post.');
			$data = array(
				'group_id' => $getdata['group_id'],
				'member_name'=>$getdata['name'],
				'leader_id'=>$getdata['leader'],
				'pwdsalt'=>rand(1000,9999),
				'member_pwd'=>$getdata['password'],
				'sex'=>$getdata['sex'],
				'birthday'=>$getdata['birthday'],
				'telphone'=>$getdata['telphone'],
				'QQ'=>$getdata['QQ'],
				"email"=>$getdata['email'],
				'status'=>0,
				'add_time'=>time(),
			);
			$data['member_pwd'] = md5(md5($data['member_pwd']).$data['pwdsalt']);
			//文件上传
			$file = request()->file('img');//结果是一个对象
			if($file){
				$fres = $file->validate(['ext'=>'jpg,jpeg,png,gif','size'=>1024*1024*5])->move(ROOT_PATH . "/public/uploads/");
				// dump($fres);die;
				if($fres){
					$data['photo'] = '/uploads/'.$fres->getSaveName();
				}else{
					$this->error($file->getError());
					
				}
			}
			$result=$this->validate($data,'user');
			if($result !== true){
				$this->error($result);
			}
			// dump($result);die;
			$res = model("member")->insert($data);
			if($res){
				$this->success("添加成功","index");
			}else{
				$this->error("添加失败");
			}
		}
		
		
	}
	public function edit($id)
	{
		if(!isset($id) || empty($id)){
			$this->error("参数错误");
		}
		if(request()->isGet()){
			$members = Db::name("member")->field("id,member_name")->select();
			$this->assign("members",$members);
			$info = model("member")->getOne(['id'=>$id]);
			$this->assign('info',$info);
			$groups = model("groups")->getAll(['status'=>1],'id,group_name');
			$this->assign('groups',$groups);
			return $this->fetch();
		}elseif (request()->isPost()) {
			// dump(input('post.'));
			$getdata = input('post.');
			$data = array(
				'group_id' => $getdata['group_id'],
				'member_name'=>$getdata['name'],
				'leader_id'=>$getdata['leader'],
				'pwdsalt'=>rand(1000,9999),
				'member_pwd'=>$getdata['password'],
				'sex'=>$getdata['sex'],
				'birthday'=>$getdata['birthday'],
				'telphone'=>$getdata['telphone'],
				'QQ'=>$getdata['QQ'],
				"email"=>$getdata['email'],
				'status'=>$getdata['status'],
				'add_time'=>time(),
			);		
			//文件上传
			$file = request()->file('img');//结果是一个对象
			if($file){
				$fres = $file->validate(['ext'=>'jpg,jpeg,png,gif','size'=>1024*1024*5])->move(ROOT_PATH . "public/uploads");
				if($fres){
					$data['photo'] = '/uploads/'.$fres->getSaveName();
				}else{
					$this->error($file->getError());
					
				}
			}
			if(empty($data['member_pwd'])){
				unset($data['member_pwd']);
			}else{
				$data['pwdsalt'] =rand(1000,9999);
				$data['member_pwd'] = md5(md5($data['member_pwd']).$data['pwdsalt']);
			}
			$result=$this->validate($data,'user');
			if($result !== true){
				$this->error($result);
			}
			$res = model("member")->getUpdate(['id'=>$id],$data);
			if($res){
				$this->success("修改成功","index");
			}else{
				$this->error("修改失败");
			}
		}	
	}

	public function del(){
		$id = input('mid',0);
		if(!isset($id) || empty($id)){
			$this->error("参数错误");
		}
		$res = model('member')->getDelete(['id'=>$id]);
		if($res){
			$this->success("删除成功","index");
		}else{
			$this->error("删除失败");
		}
	}

	/*public function search($field,$keyword,$order){
	// public function search(){
		// dump(input('post.'));die;
		$sh = input('data',0);
		dump($sh);die;
		// dump($field,$keyword,$order);die;
		// $data = array(
		// 		'member_name'=>$sh['user'],
		// 		'telphone'=>$sh['phone'],
		// 		'QQ'=>$sh['qq'],
		// 		"email"=>$sh['email'],
		// 	);
		// if(!empty($sh['field']) && !empty($sh['keyword'])){
		// 	// $group = Db::name("groups")->column('id','group_name');
		// 	// $this->assign('group',$group);
		// 	// dump($group);die;
		// 	$member = model("member")->getAll([],'*');
		// 	return $this->fetch('./member/index');
		// }
		// 
		if(empty($keyword)){
			// $group = Db::name("groups")->column('id,group_name');
			// $this->assign('group',$group);
			$member = model("member")->getAll(['id'=>1],'*');
			// $pager = $member->render();
			// dump($group);
			// dump($member);die;
			// $this->assign('pager',$pager);
			$this->assign('data',$member);
			return $this->fetch("./index");
		}else{

			$group = Db::name("groups")->column('id,group_name');
			$this->assign('group',$group);
			$member = model("member")->getAll([],'*');
			$pager = $member->render();
			// dump($group);
			// dump($member);die;
			$this->assign('pager',$pager);
			$this->assign('data',$member);
		}
		
	}*/
}
?>