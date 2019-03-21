<?php 
namespace app\oa\validate;
use think\Validate;
/**
 * 验证器类
 * 验证规则
 * @author  zhy
 * @date 2018-10-30
 */
class User extends validate
{
	//这里的参数为要验证数据的名称
	protected $rule=array(
		'group_id'=>'require',		
		// 'sex'=>'require',		
		'member_name'=>"require|min:1|max:10",
		// 'password'=>"require|min:6|max:10",
		'password'=>"min:6|max:10",
		"telphone"=>['regex'=>'/^(0|86|17951)?(13[0-9]|15[012356789]|166|17[3678]|18[0-9]|14[57])[0-9]{8}$/']
		// "telphone"=>"/^1[0-9]{1}\d{9})$/",
		// "email"=>'email',
	);
	protected $message = array(
		'group_id.require'=>'请选择上级权限',
		'member_name.require'=>'请填写用户名称',
		'member_name.min'=>'用户名称不能小于1个字符',
		'member_name.max'=>'用户名称不能超过10个字符',
		// 'sex.require'=>'请选择性别',
		// 'password.require'=>'请填写密码',
		'password.min'=>'密码不能小于6个字符',
		'password.max'=>'密码不能超过210个字符',
	);
}
 ?>