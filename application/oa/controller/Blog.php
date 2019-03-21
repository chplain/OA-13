<?php 

namespace app\oa\controller;
use think\Db;
/**
 * 博客管理控制器类
 * 实现博客的添加,修改,删除
 * @author zhy
 * @date 2018-11-4
 */
class Blog extends Base
{
	public function index(){	
		$type = input('type',0);
		if($type === 'cache'){
			// $types = Db::name("bgtype")->column("id,type");
			// $redis = getRedis();
			// $redis->set('type',$types);
			$contents = Db::name('blog')->select();


			$all_content = array();
			foreach($contents as $tk => $tv){
				$all_content[$tv['type_id']][] = $tv;
			}
			$redis = getRedis();
			$redis->set('allcontent',json_encode($all_content));
			
			//哈希用法
			// dump($all_content);die;
			// foreach($all_content as $allk => $allv){
			// 	$redis->hSet('hashcontent','type_'.$allk,json_encode($allv));
			// }
			exit('生成成功');
		}



		$userinfo =session('userinfo');
		
		//获取分类
		$type = Db::name("bgtype")->column("id,type");//以id为索引,type为值,在页面中以typeid做此数组索引查找到具体类型
		$this->assign('type',$type);
		//获取用户名
		$name = Db::name("member")->column("id,member_name");//以id为索引,type为值,在页面中以typeid做此数组索引查找到具体类型
		$this->assign('name',$name);		
		
		$data = model("blog")->getAll(['add_userid'=>$userinfo['id']],'*');
		// dump($data);die;
		$pager = $data->render();
		$this->assign('pager',$pager);
		$this->assign('data',$data);
			return view();		
		
	}
	public function add(){
		if(request()->isGet()){
			$type = Db::name("bgtype")->select();
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
			$res = model('blog')->insert($data);
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
			$info = model("blog")->getOne(['id'=>$id]);
			$this->assign('info',$info);
			$type = Db::name("bgtype")->select();
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
			$res = model('blog')->getUpdate(['id'=>$getData['id']],$data);
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
		$res = model("blog")->getDelete(['id'=>$id]);
		if($res){
				$this->success("删除成功","index");
		}else{
			$this->error('删除失败');
		}

	}
}