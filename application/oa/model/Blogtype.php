<?php 
namespace app\oa\model;
use think\Model;
use think\Db;
/**
 * 数据库模型类
 * @author zhy
 * @date 2018-11-1
 */
class Blogtype extends Base
{
	protected $name = "bgtype";
	public function getAll($where = array(),$field ="*"){
		return Db::name($this->name)->where($where)->field($field)->paginate(10);
	}

}
 ?>