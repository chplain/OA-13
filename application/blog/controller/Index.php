<?php
namespace app\blog\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index()
    {
		$userinfo =session('userinfo');
		//memcache方式
		// $mem = new \Memcache();
		// $mem->connect('127.0.0.1',11211);
		// $type = $mem->get('type');	
		$redis = getRedis();//redis方式
		$type = json_decode($redis->get("type"),true);
		// $type = json_decode($redis->hGet("blogshow","type"));
		if(empty($type)){
			$type = Db::name("bgtype")->column("id,type");//以id为索引,type为值,在页面中以typeid做此数组索引查找到具体类型
			$redis->set('type',json_encode($type));
			// $redis->hSet('type',json_encode($type));
			// $mem->set('blogshow','type',$type);
		}	
		$type = Db::name("bgtype")->column("id,type");//以id为索引,type为值,在页面中以typeid做此数组索引查找到具体类型
		$this->assign('type',$type);
		//获取用户名
		$name = Db::name("member")->column("id,member_name");//以id为索引,type为值,在页面中以typeid做此数组索引查找到具体类型
		$this->assign('name',$name);		
		
		$data = model("blog")->getAll(['add_userid'=>$userinfo['id']],'*');
		$this->assign('data',$data);
		return $this->fetch();
		
    }


    public function artlist(){
    	$id = input('id');
    	$this->assign('lid',$id);
    	// dump($id);die;
    	$redis = getRedis();
    	// $allcontent = json_decode($redis->hGet('hashcontent','type_'.$id),true);//哈希用法
    	$allcontent = json_decode($redis->get('allcontent'),true);
    	$userinfo =session('userinfo');
    	//获取分类
		$type = Db::name("bgtype")->column("id,type");//以id为索引,type为值,在页面中以typeid做此数组索引查找到具体类型
		$this->assign('type',$type);
		//获取用户名
		$name = Db::name("member")->column("id,member_name");//以id为索引,type为值,在页面中以typeid做此数组索引查找到具体类型
		$this->assign('name',$name);
		$this->assign('data',$allcontent[$id]);
		// dump($allcontent[$id]);die;
        return $this->fetch('./artlist');
    }

    public function article(){
    	$id = input('id');
    	$lid = input('lid');
    	$this->assign('lid',$lid);
    	$redis = getRedis();
    	// $allcontent = json_decode($redis->hGet('hashcontent','type_'.$id),true);//哈希用法
    	$allcontent = json_decode($redis->get('allcontent'),true);
    	$userinfo =session('userinfo');
    	//获取分类
		$type = Db::name("bgtype")->column("id,type");//以id为索引,type为值,在页面中以typeid做此数组索引查找到具体类型
		$this->assign('type',$type);
		//获取用户名
		$name = Db::name("member")->column("id,member_name");//以id为索引,type为值,在页面中以typeid做此数组索引查找到具体类型
		$this->assign('name',$name);
		$this->assign('data',$allcontent[$lid][$id]);
		// dump($allcontent[$lid][$id]);die;
        return $this->fetch('./article');
    }
}
