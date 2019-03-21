<?php 
namespace app\blog\controller;
use think\Db;
use think\Controller;

/**
 * 微信小程序API数据接口
 * @author zhy
 * @data 2018-11-16
 */
class Getlist extends Controller
{
	public function index(){
		$wh = input('title');
		$page = input('pages');
		$condition = array();
		$condition['title'] = ["like","%".$wh."%"];
		
		$res = Db::name('blog')->where($condition)->paginate($page);
		$r = json_encode($res);
		return $r;
		
	}
	public function getInfo(){
		$id = input('id');
		$condition = array();
		$condition['id'] = $id;
		
		$res = Db::name('blog')->where($condition)->value('content');
		$r = htmlspecialchars_decode($res);
		return $res;
		
	}
}
 ?>