<?php 
namespace app\oa\model;
use think\Model;
use think\Db;
/**
 * 数据库模型类
 * @author zhy
 * @date 2018-11-1
 */
class Permission extends Base
{
	/*
	name 值为表名,与数据库表前缀配合使用oa_rule
	table 值为表名,不会与表前缀结合成表名
	 */
	protected $name = "rule";
	// protected $table = "oa_rule";
	/*//连接其他数据库
	protected $connection = array(
		'type'=>'mysql',
		'host'=>'192.168.1.1',
	);*/
	/*public function _initialize(){
		dump($this);die;
	}*/

	// public function getAll($where = array(),$field ="*"){
	// 	return Db::name($this->name)->where($where)->field($field)->paginate(10);
	// }

	
	

}
 ?>