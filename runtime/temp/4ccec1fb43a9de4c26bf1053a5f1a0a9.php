<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:85:"D:\my\kecheng\thinkphp\OAofficeSystem\public/../application/oa\view\member\index.html";i:1542004340;s:69:"D:\my\kecheng\thinkphp\OAofficeSystem\application\oa\view\layout.html";i:1540898587;s:74:"D:\my\kecheng\thinkphp\OAofficeSystem\application\oa\view\common\head.html";i:1541253332;s:76:"D:\my\kecheng\thinkphp\OAofficeSystem\application\oa\view\common\navbar.html";i:1541253489;s:77:"D:\my\kecheng\thinkphp\OAofficeSystem\application\oa\view\common\sidebar.html";i:1541596562;s:76:"D:\my\kecheng\thinkphp\OAofficeSystem\application\oa\view\common\footer.html";i:1541053303;s:76:"D:\my\kecheng\thinkphp\OAofficeSystem\application\oa\view\common\script.html";i:1540990239;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo \think\Config::get('appname'); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="keywords" content="关键词"/>
	<meta name="description" content="网站描述"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
	<link rel="stylesheet" href="/static/css/bootstrap.css"/>
	<link rel="stylesheet" href="/static/css/font-awesome.css"/>
	<link rel="stylesheet" href="/static/css/jquery-ui.css"/>
	<link rel="stylesheet" href="/static/css/ace-fonts.css"/>
	<link rel="stylesheet" href="/static/css/ace.css" class="ace-main-stylesheet" id="main-ace-style"/>
	<script src="/static/js/ace-extra.js"></script>
	<script src="/static/js/jquery.js"></script>
</head>
<body class="no-skin">
	<div id="navbar" class="navbar navbar-default">
		<div class="navbar-container" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="navbar-header pull-left">
				<a href="index.html" class="navbar-brand">
					<small><i class="fa fa-home"></i><?php echo \think\Config::get('appname'); ?></small>
				</a>
			</div>
			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">
					<li class="red">
						<a href="#" title="前台首页" target="_blank">
							<i class="ace-icon fa fa-home"></i>
						</a>
					</li>
					<li class="light-blue">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<?php if(\think\Session::get('userinfo.photo')): ?>
							<img class="nav-user-photo" src="<?php echo \think\Session::get('userinfo.photo'); ?>" alt="admin" />					
							<?php else: ?>
							<img class="nav-user-photo" src="<?php echo \think\Config::get('default_headimg'); ?>" alt="admin" />
							<?php endif; ?>
							<span class="user-info">
							<small>欢迎光临</small><?php echo \think\Session::get('userinfo.member_name'); ?></span><i class="ace-icon fa fa-caret-down"></i>
						</a>
						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<li>
								<a href="profile.html"><i class="ace-icon fa fa-user"></i>个人资料</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?php echo url('login/outLogin'); ?>"><i class="ace-icon fa fa-power-off"></i>退出</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="ace-settings-container" id="ace-settings-container">
		<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
			<i class="ace-icon fa fa-cog bigger-130"></i>
		</div>
		<div class="ace-settings-box clearfix" id="ace-settings-box">
			<div class="pull-left width-50">
				<div class="ace-settings-item">
					<div class="pull-left">
						<select id="skin-colorpicker" class="hide">
							<option data-skin="no-skin" value="#438EB9">#438EB9</option>
							<option data-skin="skin-1" value="#222A2D">#222A2D</option>
							<option data-skin="skin-2" value="#C6487E">#C6487E</option>
							<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
						</select>
					</div>
					<span>&nbsp; 选择皮肤</span>
				</div>
				<div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar"/>
					<label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
				</div>
				<div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar"/>
					<label class="lbl" for="ace-settings-sidebar"> 固定侧边栏</label>
				</div>
				<div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs"/>
					<label class="lbl" for="ace-settings-breadcrumbs"> 固定面包屑</label>
				</div>
				<div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl"/>
					<label class="lbl" for="ace-settings-rtl"> 切换至左边</label>
				</div>
				<div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container"/>
					<label class="lbl" for="ace-settings-add-container">切换宽窄度</label>
				</div>
			</div>
			<div class="pull-left width-50">
				<div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover"/>
					<label class="lbl" for="ace-settings-hover"> 子菜单收起</label>
				</div>
				<div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact"/>
					<label class="lbl" for="ace-settings-compact"> 侧边栏紧凑</label>
				</div>
				<div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight"/>
					<label class="lbl" for="ace-settings-highlight"> 当前位置</label>
				</div>
			</div>
		</div>
	</div>
	<div class="main-container" id="main-container">
				<div id="sidebar" class="sidebar responsive">
			<div class="sidebar-shortcuts" id="sidebar-shortcuts">
				<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
					<button class="btn btn-success">
						<i class="ace-icon fa fa-signal"></i>
					</button>
					<button class="btn btn-info">
						<i class="ace-icon fa fa-pencil"></i>
					</button>
					<button class="btn btn-warning">
						<i class="ace-icon fa fa-users"></i>
					</button>
					<button class="btn btn-danger">
						<i class="ace-icon fa fa-cogs"></i>
					</button>
				</div>
				<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
					<span class="btn btn-success"></span>
					<span class="btn btn-info"></span>
					<span class="btn btn-warning"></span>
					<span class="btn btn-danger"></span>
				</div>
			</div>
			<ul class="nav nav-list">
				<li class="active">
					<a href="/">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text">首页</span>
					</a>
					<b class="arrow"></b>
				</li>
				<?php if(is_array($tree) || $tree instanceof \think\Collection || $tree instanceof \think\Paginator): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
				<li>
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-<?php echo $val['icon']; ?>"></i>
						<span class="menu-text"><?php echo $val['per_name']; ?></span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>
					<ul class="submenu">
						<?php if(is_array($val['children']) || $val['children'] instanceof \think\Collection || $val['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $val['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
						<li>
							<a href="<?php echo url($item['address']); ?>"><i class="menu-icon fa fa-caret-right"></i><?php echo $item['per_name']; ?></a>
							<b class="arrow"></b>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>              
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				<li>
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-user"></i>
						<span class="menu-text">个人中心</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>
					<ul class="submenu">
						<li>
							<a href="profile.html"><i class="menu-icon fa fa-user"></i>个人资料</a>
							<b class="arrow"></b>
						</li>
						<li>
							<a href="<?php echo url('login/outLogin'); ?>"><i class=""></i>退出</a>
							<b class="arrow"></b>
						</li>                    
					</ul>
				</li>
			</ul>
			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left"
				data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>
		
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="/">首页</a>
				</li>
				<li>
					<a href="#">用户及组</a>
				</li>
				<li class="active">用户管理</li>
			</ul>
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<form class="form-inline" id="myform" method="post">
							<a class="btn btn-info" href="<?php echo url('member/add'); ?>">新增</a>
							<label class="inline">用户搜索</label>
							<select name="field" class="form-control">
								<option  value="user">用户名</option>
								<option  value="phone">电话</option>
								<option  value="QQ">QQ</option>
								<option  value="email">邮箱</option>
							</select>
							<input type="text" name="keyword" value="" class="form-control">
							<label class="inline">&nbsp;&nbsp;排序：</label>
							<select name="order" class="form-control">
								<option  value="asc">添加时间升</option>
								<option  value="desc">添加时间降</option>
							</select>
							<button type="submit" class="btn btn-purple btn-sm" >
							<!-- <button type="submit" class="btn btn-purple btn-sm"  onclick="ajaxPost()"> -->
							<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>搜索</button>
						</form>
					</div>
					<div class="row">
						<div class="space-4"></div>							
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center">用户编号</th>
									<th>用户名</th>
									<th>用户组</th>
									<th class="center">性别</th>
									<th class="center">生日</th>
									<th>电话</th>
									<th>Q&nbsp;Q</th>
									<th>邮箱</th>
									<th class="center">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
								<tr>
									<td class="center">
										<?php echo $val['id']; ?>
									</td>
									<td><?php echo $val['member_name']; ?></td>
									<td class="grouptd">
										<span class="group" val="1"><?php echo $group[$val['group_id']]; ?></span>											
									</td>
									<td class="center"><?php echo $val['sex']==1?"男":"女"; ?></td>
									<td class="center"><?php echo $val['birthday']; ?></td>
									<td><?php echo $val['telphone']; ?></td>
									<td><?php echo $val['QQ']; ?></td>
									<td><?php echo $val['email']; ?></td>
									<td class="center">		
										<?php if($val['id'] != 1): ?>							
										<a href="<?php echo url('member/edit',array('id'=>$val['id'])); ?>">修改</a>&nbsp;|
										<a class="del" href="javascript:;" title="删除" data-id="<?php echo $val['id']; ?>">删除</a>													
										<?php endif; ?>
									</td>
								</tr>
								<?php endforeach; endif; else: echo "" ;endif; ?>  
							</tbody>
						</table>
						<div style="text-align:center;"><?php echo $pager; ?>	</div>							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(".del").click(function(){
		var obj = $(this);
		var id = $(obj).attr("data-id");
		console.log(id);
		layer.confirm("确定要删除该用户吗?",function(index){	
			$.get('<?php echo url("member/del"); ?>',{mid:id},function(res){
				if (res.code == 1) {
					layer.close(index);
					// $(obj).parent().parent().remove();
					window.location.href=res.url;
				}

			});
		});
	});
	         /*function ajaxPost(){  
	         	alert(1);
                var formData = $("#myform").serialize();  
                console.log(formData);
                //serialize() 方法通过序列化表单值，创建 URL 编码文本字符串,这个是jquery提供的方法  
                $.get('<?php echo url("member/search"); ?>',{data:formData},function(res){
				// if (res.code == 1) {
				// 	// $(obj).parent().parent().remove();
				// 	window.location.href=res.url;
				// }
				alert(res);

			});
            }  */


            // function ajaxPost(){  
            //     var formData = $("#myform").serialize();  
            //     //serialize() 方法通过序列化表单值，创建 URL 编码文本字符串,这个是jquery提供的方法  
            //     $.ajax({  
            //         type:"post",  
            //         url:"<?php echo url('member/search'); ?>",  
            //         data:formData,//这里data传递过去的是序列化以后的字符串  
            //         success:function(data){  
            //             // $("#content").append(data);//获取成功以后输出返回值  
            //             // window.location.href = res.url;
            //             alert(data);
            //         }  
            //     });  
            // }  
</script>

		<div class="footer">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
			<small>Copyright &copy; 2018 zhy All Rights Reserved.</small>
			</span>
		</div>
	</div>   
</div>
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>    
	</div>
	<script src="/static/js/bootstrap.js"></script>
	<script src="/static/js/bootbox.js"></script>
	<script src="/static/js/ace/elements.scroller.js"></script>
	<script src="/static/js/ace/elements.colorpicker.js"></script>
	<script src="/static/js/ace/elements.aside.js"></script>
	<script src="/static/js/ace/ace.js"></script>
	<script src="/static/js/ace/ace.touch-drag.js"></script>
	<script src="/static/js/ace/ace.sidebar.js"></script>
	<script src="/static/js/ace/ace.sidebar-scroll-1.js"></script>
	<script src="/static/js/ace/ace.submenu-hover.js"></script>
	<script src="/static/js/ace/ace.widget-box.js"></script>
	<script src="/static/js/ace/ace.settings.js"></script>
	<script src="/static/js/ace/ace.settings-rtl.js"></script>
	<script src="/static/js/ace/ace.settings-skin.js"></script>
	<script src="/static/js/jquery-ui.js"></script>
	<script src="/static/js/layer/layer.js"></script>
</body>
</html>