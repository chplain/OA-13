<?php 

namespace app\oa\controller;
use think\Db;
/**
 * 博客类型管理控制器类
 * 实现博客类型的添加,修改,删除
 * @author zhy
 * @date 2018-11-4
 */
class Blogtype extends Base
{
	public function index(){
		$type = input('type',0);
		if($type === 'cache'){
			$types = Db::name("bgtype")->column("id,type");
			$redis = getRedis();
			$redis->set('type',$types);
			exit('生成成功');
		}

		$userinfo =session('userinfo');		
		//获取分类
		$type = model("blogtype")->getAll();//以id为索引,type为值,在页面中以typeid做此数组索引查找到具体类型
		$pager = $type->render();
		$this->assign('data',$type);
		$this->assign('pager',$pager);
		return view();		
		
	}
	public function add(){
		if(request()->isGet()){
			return view();
		}elseif(request()->isPost()){			
			$getData = input('post.');
			$data = array(
				'type'=>$getData['type'],
			);
			$res = model('blogtype')->insert($data);
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
			$info = model("blogtype")->getOne(['id'=>$id]);
			$this->assign('info',$info);
			return view();
		}elseif(request()->isPost()){
		// 	dump(input('editorValue'));
		// 	dump(input("post."));die;
			$getData = input('post.');
			$data = array(
				'type'=>$getData['type'],
			);
			$res = model('blogtype')->getUpdate(['id'=>$getData['id']],$data);
			if($res){
				$this->success("修改成功","index");
			}else{
				$this->error('修改失败');
			}
		}
	}
	public function del(){
		$id = input('id',0);
		// dump($id);die;
		if(!isset($id) || empty($id)){
			$this->error("参数错误");
		}
		$res = model("blogtype")->getDelete(['id'=>$id]);
		if($res){
				$this->success("删除成功","index");
		}else{
			$this->error('删除失败');
		}

	}
}