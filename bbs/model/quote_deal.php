<?php 
include '../init.php';
include DIR_CORE . 'MySQLDB.php';

$rep_content = escapeString($_POST['rep_content']);

$rep_pub_id = $pub_id = $_GET['pub_id'];

$rep_quote_id  = $rep_id = $_GET['rep_id'];

$rep_num = $num =$_GET['num'];

if(empty($rep_content)){
	jump("./quote.php?num=$num&pub_id=$pub_id&rep_id=$rep_id",'内容不能为空');
}

session_start();
$rep_user = $_SESSION['userInfo']['user_name'];//回复者名字
$rep_time = time();

$sql = "insert into reply values(null,$rep_pub_id,'$rep_user','$rep_content',$rep_time,$rep_num,$rep_quote_id)";
$result = $pdo->query($sql);
if($result){
	jump("show.php?pub_id=$pub_id&action=reply");
}else{
	jump("./quote.php?num=$num&pub_id=$pub_id&rep_id=$rep_id",'未知错误');
}
