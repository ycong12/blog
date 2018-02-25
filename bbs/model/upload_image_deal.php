<?php 
include '../init.php';

include DIR_CORE.'MySQLDB.php';

include DIR_CORE.'upload.php';

$file = $_FILES['image'];
$allow = array('image/jpg','image/jpeg','image/png','image/gif');
$path = DIR_UPLOADS.'images';
$result = upload($file,$allow,$error,$path);
if($result){
	session_start();
	$user_name = $_SESSION['userInfo']['user_name'];
	$old_sql = "select user_image from user where user_name='$user_name'";
	$old_row = $pdo->query($old_sql)->fetch(PDO::FETCH_ASSOC);
	$old_name = $old_row['user_image'];
	$sql = "update user set user_image='$result' where user_name = '$user_name'";
	$res = $pdo->query($sql);
	if($res){
		unlink($path.'/'.$old_name);
		jump('./list_father.php','头像上传成功');
	}else{
		jump('./upload_image.php','未知错误，上传失败');
	}
}else{
	jump('./upload_image.php','发生未知错误,上传失败');
}