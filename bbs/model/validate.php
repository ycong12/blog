<?php 
include '../init.php';
include DIR_CORE.'MySQLDB.php';
//接收数据
$user_name = trim($_POST['user_name']);
$user_password = trim($_POST['user_password']);

//判断数据
if(empty($user_name)||empty($user_password)){
	jump('./login.php','用户名和密码不能为空');
}
// var_dump($user_name);
$sql = "select * from user where user_name='$user_name'";
// var_dump($pdo->query($sql)->rowCount()) ;
// die;
if(!$pdo->query($sql)->rowCount()){
	jump('./login.php','用户名不存在');
}
$stmt = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
$ture_password = $stmt['user_password'];
// var_dump($ture_password);
// die;

if(md5($user_password)==$ture_password){
	if(isset($_POST['remember'])){
		setCookie('user_id',$stmt['user_id'],time()+60400,'/');
	}
	//保存用户的信息
	session_start();
	@$_SESSION['userInfo'] = $stmt;

	jump('./publish.php','跳转发帖页面');
}else{
	jump('./login.php','密码不正确');
}
