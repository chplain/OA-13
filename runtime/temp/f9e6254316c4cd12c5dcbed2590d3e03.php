<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"D:\my\kecheng\thinkphp\OAofficeSystem\public/../application/blog\view\index\index.html";i:1541952751;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>博客首页</title>
	<link rel="stylesheet" href="/static/css/bootstrap.css"/>
	<!--  bootstrap.js依赖jquery  -->
<script src="/static/js/jquery.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="/static/js/bootstrap.js"></script>
</head>
<style type="text/css">
.show{position:fixed;top:0;width:100%;height:80px;background:#eee;z-index: 100}
.show_box{width:1200px;margin:0 auto;}
	.nav li{line-height:40px;float:left;width:100px;background:#dfdfdf;text-align:center;margin-right:10px;border-radius:5px;}
	ul.nav:after{content:'';display:block;clear:both;}
	ul.nav{mwidth:800px;overflow:hidden;list-style:none;margin-top:20px;}
	.login{position:relative;top:-40px;}
</style>
<body style="background: #fcfcfc;">
		<div class="show">
			<div class="show_box">
			<ul class="nav">
				<?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): if( count($type)==0 ) : echo "" ;else: foreach($type as $key=>$val): ?>
				<li><a href="<?php echo url('index/artlist',array('id'=>$key)); ?>"><?php echo $val; ?></a></li>		
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		<a href="javascript:;" class="btn btn-info login" style="float:right; margin-right:100px;">登录</a>		
			</div>
			
	</div>
<div class="warp">
<div class="box">
		<div class="left">
			<div class="title">
				推荐
			</div>
			<div class="content">
		
		<a href="javascript:;">111111111</a><br>
		
		</div>
		</div>
		<div class="right"></div>
</div>
</div>
<style type="text/css">
.box{width:1200px;margin:10px auto;}
	.warp{width:100%;height:80px;margin-top:100px;}
	.left{width:790px;height:600px;background:#eee; float:left;margin-right:10px;border-radius:5px;}
	.right{width:400px;height:600px;background:#eee;float:left;border-radius:5px;}
	.title{width:100%;height:60px; background:#e3e3e3;border-radius:5px;font-size:30px;line-height:60px;}
}
</style>
</body>
</html>