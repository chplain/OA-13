<?php 

namespace app\oa\controller;
use think\Db;
/**
 * 周报管理控制器类
 * 实现周报的添加,修改,删除
 * @author zhy
 * @date 2018-11-4
 */
class Week extends Base
{
	public function index(){			
		$userinfo =session('userinfo');
		$this->assign("now_user",$userinfo['id']);
		
		//获取分类
		$type = Db::name("wktype")->column("id,type");//以id为索引,type为值,在页面中以typeid做此数组索引查找到具体类型
		$this->assign('type',$type);
		//获取用户名
		$name = Db::name("member")->column("id,member_name");//以id为索引,type为值,在页面中以typeid做此数组索引查找到具体类型
		$this->assign('name',$name);		
		
		//取得当前用户的所有直属下级
		$showid = model("weekly")->getLeaderId(['a.add_userid' => $userinfo['id']],"b.id");
		array_push($showid,$userinfo['id']);
		$showid = implode($showid,",");
		//拼查询条件
		$condition = "add_userid IN (".$showid.")";	
		$data = model("weekly")->getAll($condition,'*');
		
		$pager = $data->render();
		$this->assign('pager',$pager);
		$this->assign('data',$data);
			return view();		
		
	}
	public function add(){
		if(request()->isGet()){
			$type = Db::name("wktype")->select();
			$this->assign("types",$type);
			return view();
		}elseif(request()->isPost()){			
			$getData = input('post.');
			$data = array(
				'title'=>$getData['title'],
				'type_id'=>$getData['type'],
				'add_userid'=>$getData['author'],
				'add_time'=>time(),
				'content'=>$getData['editorValue'],
				'status'=>0,
			);
			$res = model('weekly')->insert($data);
			if($res){
				$this->success("添加成功","index");
			}else{
				$this->error('添加失败');
			}
			// echo \think\Db::getLastSql();die;

		}
	}
	public function edit($id){
		if(!isset($id) || empty($id)){
			$this->error("参数错误");
		}
		if(request()->isGet()){
			$info = model("weekly")->getOne(['id'=>$id]);
			$this->assign('info',$info);
			$type = Db::name("wktype")->select();
			$this->assign("types",$type);
			return view();
		}elseif(request()->isPost()){
		// 	dump(input('editorValue'));
		// 	dump(input("post."));die;
			$getData = input('post.');
			$data = array(
				'title'=>$getData['title'],
				'type_id'=>$getData['type'],
				'add_userid'=>$getData['author'],
				'add_time'=>time(),
				'content'=>$getData['editorValue'],
				'status'=>$getData['status'],
			);
			$res = model('weekly')->getUpdate(['id'=>$getData['id']],$data);
			if($res){
				$this->success("修改成功","index");
			}else{
				$this->error('修改失败');
			}
		}
	}
	public function del(){
		$id = input('wid',0);
		// dump($id);die;
		if(!isset($id) || empty($id)){
			$this->error("参数错误");
		}
		$res = model("weekly")->getDelete(['id'=>$id]);
		if($res){
				$this->success("删除成功","index");
		}else{
			$this->error('删除失败');
		}

	}

	public function cat($id){
		if(!isset($id) || empty($id)){
			$this->error("参数错误");
		}
		if(request()->isGet()){
			$info = model("weekly")->getOne(['id'=>$id]);
			$this->assign('info',$info);
			$type = Db::name("wktype")->select();
			$this->assign("types",$type);
			return view();
		}
	}


}