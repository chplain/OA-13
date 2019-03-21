<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/*
在权限规则前根据层级增加对应的  |___
 */
function getRuleLevel($data,$pid =0,$level = 0){
	static $newRule = [];
	foreach ($data as $key => $value) {
		// $value['level'] = $level;
		if($value['pid']!= 0){
			$value['per_name'] = str_repeat("&nbsp;",$level)."┗".str_repeat("━",$level).$value['per_name'];
		}
		if($value['pid'] == $pid){
			getRuleLevel($data,$value['id'],$level+1);
			$newRule[] = $value;
		}
	}
	sort($newRule);
	return $newRule;
}

//无限级分类
function ruleTree($data,$pid=0){
	$tree = array();
	foreach ($data as $key => $value) {
		if($value['pid'] == $pid){
			$value['children'] = ruleTree($data,$value['id']);
			$tree[] = $value;
		}
	}
	return $tree;
}
//过滤字符串,登录验证
function trimStr($str){
	$str = str_replace(" ","",$str);
	$str = str_replace("\'","",$str);
	return $str;
}

function getRedis(){
	$redis = new \Redis();
	$redis->connect('127.0.0.1');
	$redis->auth('123456');
	return $redis;
}