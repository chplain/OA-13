<?php 
namespace app\oa\model;
use think\Model;
use think\Db;
/**
 * 数据库模型类
 * @author zhy
 * @date 2018-11-1
 */
class Weekly extends Base
{
	protected $name = "weekly";
	/*public function getAll($where = array(),$field ="*"){
		return Db::name($this->name)->alias("a")->join("oa_wktype b","a.type_id = b.id","left")->join("oa_member c","a.add_userid = c.id","left")->where($where)->field($field)->paginate(10);
	}*/
	public function getAll($where = array(),$field ="*"){
		return Db::name($this->name)->where($where)->field($field)->paginate(10);
	}
	public function getLeaderId($where = array(),$field ="*"){
		return Db::name($this->name)->distinct(true)->alias("a")->join("oa_member b","a.add_userid = b.leader_id","inner")->where($where)->column($field);
	}

}
 ?>