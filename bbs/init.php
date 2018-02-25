<?php 
header("content-type:text/html;charset=utf-8");

// echo __DIR__.'</br>';
define("DIR_ROOT", str_replace('\\', '/', __DIR__).'/');
define("DIR_CONFIG", DIR_ROOT.'config/');
define("DIR_CORE", DIR_ROOT.'core/');
define("DIR_MODEL", DIR_ROOT.'model/');
define("DIR_PUBLIC", DIR_ROOT.'public/');
define("DIR_VIEW", DIR_ROOT.'view/');
define("DIR_STYLE", 'http://localhost/bbs/public/');
//uploads文件目录常量
define("DIR_UPLOADS",DIR_ROOT.'uploads/');


//封装跳转函数
function jump($url,$info,$time=2){
	if($info==null){
		header("location:$url");
	}else{
		header("refresh:$time;url=$url");
		die("$info");
	}
}


//封装数据处理函数
/*
@param string $str 用户提交的信息
*/
function escapeString($str){
	return addslashes(strip_tags(trim($str)));
}	