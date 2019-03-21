<?php 
namespace app\oa\validate;
use think\Validate;
/**
 * 验证器类
 * 验证规则
 * @author  zhy
 * @date 2018-11-4
 */
class Group extends validate
{
	
	protected $rule=array(
		'user'=>'require',
		'password'=>'require|min:6|max:10',
	);
	protected $message = array(
		'user.require'=>'请填写用户组名称',
		'password.require'=>'请填写密码',
		'password.min'=>'密码格式错误',
		'password.max'=>'密码格式错误',
	);
}
 ?>