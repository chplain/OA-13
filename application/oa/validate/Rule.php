<?php 
namespace app\oa\validate;
use think\Validate;
/**
 * 验证器类
 * 验证规则
 * @author  zhy
 * @date 2018-10-30
 */
class Rule extends validate
{
	
	protected $rule=array(
		'pid'=>'require',
		'per_name'=>"require|min:2|max:10"
	);
	protected $message = array(
		'pid.require'=>'请选择上级权限',
		'per_name.require'=>'请填写权限名称',
		'per_name.min'=>'权限规则名称不能少于2个字符',
		'per_name.max'=>'权限规则名称不能超过10个字符'
	);
}
 ?>