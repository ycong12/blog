<?php 
include '../init.php';

session_start();
if(!isset($_SESSION['userInfo'])){
	jump('./login.php','请你先登录！');
}

include DIR_CORE.'MySQLDB.php';

//接收id号
$pub_id = $_GET['pub_id'];

$sql = "select * from publish where pub_id=$pub_id";
$result = $pdo->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
include DIR_VIEW.'reply.html';
