<?php 
include '../init.php';
include DIR_CORE . 'MySQLDB.php';

$pub_id = $rep_pub_id = $_POST['pub_id'];
$rep_content = escapeString($_POST['rep_content']);

if(empty($rep_content)){
	jump("./reply.php?$pub_id",'回复的内容不能为空');
}
session_start();

$rep_user = $_SESSION['userInfo']['user_name'];
$rep_time = time();
$sql = "insert into reply values(null,$rep_pub_id,'$rep_user','$rep_content','$rep_time',default,default)";

$result = $pdo->exec($sql);

if($result){
	jump("./show.php?pub_id=$pub_id&action=reply");
}else{
	jump("./reply.php?pub_id=$pub_id",'发生未知错误，回帖失败');
}