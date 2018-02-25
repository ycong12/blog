<?php 
include '../init.php';
session_start();
if(!isset($_SESSION['userInfo'])){
	jump('./login.php','请你先登录');
}
include DIR_CORE.'MySQLDB.php';

//接收数据
//楼层数
$num = $_GET['num'];
//楼主的ID
$pub_id  = $_GET['pub_id'];
//被引用的帖子的id
$rep_id = $_GET['rep_id'];

//提取楼主的信息
$sql = "select * from publish where pub_id=$pub_id";
$row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

//提取被引用的帖子的信息
$sql = "select * from reply where rep_id = $rep_id";
$rep_row =  $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

include DIR_VIEW .'quote.html';