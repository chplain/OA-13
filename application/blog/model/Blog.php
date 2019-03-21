<?php 
namespace app\blog\model;
use think\Model;
use think\Db;
/**
 * 数据库模型类
 * @author zhy
 * @date 2018-11-1
 */
class Blog extends Base
{
	protected $name = "blog";
	public function getAll($where = array(),$field ="*"){
		return Db::name($this->name)->alias("a")->join("oa_bgtype b","a.type_id = b.id","left")->join("oa_member c","a.add_userid = c.id","left")->where($where)->field($field)->paginate(10);
	}

}
 ?>