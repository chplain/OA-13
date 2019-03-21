<?php 
namespace app\oa\model;
use think\Model;
use think\Db;
/**
 * 数据库模型类
 * @author zhy
 * @date 2018-11-1
 */
class Member extends Base
{
	protected $name = "member";

	public function getAll($where = array(),$field ="*"){
		return Db::name($this->name)->where($where)->field($field)->paginate(1);
	}
	// public function getSearch($where = array(),$field ="*"){
	// 	return Db::name($this->name)->where($where)->field($field)->paginate(1);
	// }

}
 ?>