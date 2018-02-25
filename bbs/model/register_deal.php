<?php 
include '../init.php';
include '../core/MySQLDB.php';
//接收数据
$user_name = trim($_POST['user_name']);
$user_password1 = trim($_POST['user_password1']);
$user_password2 = trim($_POST['user_password2']);
$vcode = trim($_POST['vcode']);


//判断数据合法性
if(@strtolower($vcode)!=strtolower($_SESSION['captcha'])){
	jump('./register.php','验证码不正确',15);

}

if(empty($user_name)||empty($user_password1)||empty($user_password2)){
	jump('./register.php','用户名和密码不能为空，请你重新注册');
}
//判断用户名的长度
if(strlen($user_name) < 6|| strlen($user_name) > 16 )
{
	jump('./register.php','用户名在6到16位之间，请你重新注册');

}
// die;
$sql = "select * from user where user_name='$user_name'";
if($pdo->query($sql)->rowCount()){
	jump('./register.php','你输入的用户名已存在！请你重新注册');

}
if($user_password1!=$user_password2){
	jump('./register.php','两次密码不正确,请重新注册');

}

//数据入库
$user_password = md5($user_password1);
$sql = "insert into user values(null,'$user_name','$user_password',default)";
$stmt = $pdo->query($sql);
if($stmt){
	jump('./login.php','注册成功，3秒后跳转到登录页面',3);

}else{
	jump('./register.php','注册失败，请重新注册');

}