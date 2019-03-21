<?php 
namespace app\oa\controller;
use think\Controller;

/**
 * 判断是否登录模块,此模块不用验证登录
 */
class Login extends Controller
{
	public function index(){
		return $this->fetch('./login');
	}
	public function showyzm(){
		//参数一:验证码的id
		return captcha('',array('length'=>4,'useNoise'=>false));
	}
	//验证登录
	public function doLogin(){		
		//获取输入信息
		$data = input('post.');
		// if(empty($data['user'])|| empty($data['password'])  || empty($data['yzm']) ){
		// 	$this->error("请填完整登录信息");
		// }
		
		// //去除危险字符
		// $username =trimStr($data['user']);
		// //判断验证码
		// if(!captcha_check($data['yzm'])){
		// 	$this->error("验证码错误");
		// }
		// //判断用户是否存在
		$info = model("member")->getOne(['member_name'=>$data['user']]);	
		// if(empty($info)){
		// 	$this->error("用户不存在");
		// }else{
		// 	//验证密码
		// 	$userpwd = md5(md5($data['password']).$info['pwdsalt']);
		// 	if($userpwd != $info['member_pwd']){
		// 		$this->error("密码错误");
		// 	}else{
				session('userinfo',$info);
				$this->success("登陆成功","index/index");
			// }
			
			
		// }

		
	}
	//退出登录
	public function outLogin(){
		session("userinfo",null);
		$this->redirect("login/index");
	}
}
 ?>