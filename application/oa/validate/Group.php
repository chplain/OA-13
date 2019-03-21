<?php 
namespace app\oa\validate;
use think\Validate;
/**
 * 验证器类
 * 验证规则
 * @author  zhy
 * @date 2018-10-30
 */
class Group extends validate
{
	
	protected $rule=array(
		'group_name'=>'require',
	);
	protected $message = array(
		'group_name.require'=>'请填写用户组名称',
	);
}
 ?>