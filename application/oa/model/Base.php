<?php
namespace app\oa\model;

use think\Model;
use think\Db;

/**
 *自定义数据库模型基础类
 *实现查找指定条件指定字段的数据
 *实现查找指定条件指定字段的一条数据
 *实现指定条件的删除操作
 *@author zhy
 *@date 2018-11-1
 * 
 */
class Base extends Model
{

	//符合条件的所有记录
	public function getAll($where = array(),$field ="*"){
		return Db::name($this->name)->where($where)->field($field)->select();
	}

	//查找单条记录
	public function getOne($where = array(),$field ="*"){
		return Db::name($this->name)->where($where)->field($field)->find();
	}

	//修改记录
	public function getUpdate($where = array(),$data){
		return Db::name($this->name)->where($where)->update($data);
	}




	//删除权限表的记录
	public function getDelete($where){
		return Db::name($this->name)->where($where)->delete();

	}
}