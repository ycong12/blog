<?php 
include '../init.php';
include DIR_CORE.'MySQLDB.php';

//接收数据
$pub_title = escapeString($_POST['pub_title']);
$pub_content = escapeString($_POST['pub_content']);

//验证数据
if(empty($pub_title)||empty($pub_content)){
	jump('./publish.php','标题和内容不能为空');
}
//游客的名字
session_start();
$pub_owner =$_SESSION['userInfo']['user_name'];

$pub_time = time();

$sql = "insert into publish values(null,'$pub_title','$pub_content','$pub_owner','$pub_time',default)";

$stmt = $pdo->exec($sql);

if($stmt){
	jump('./list_father.php');
}else{
	jump('./publish.php','发帖失败');
}