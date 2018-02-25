<?php 
include '../init.php';
//判断是否设置了7天免登录
session_start();
if(isset($_COOKIE['user_id'])){
	include DIR_CORE.'MySQLDB.php';
	$user_id = $_COOKIE['user_id'];
	$sql = "select * from user where user_id = $user_id";
	$result = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
	$_SESSION['userInfo'] = $result;
}

include DIR_VIEW.'index.html';