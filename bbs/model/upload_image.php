<?php 
include '../init.php';
session_start();
if(!isset($_SESSION['userInfo'])){
	jump('./login.php','请你先登录');
}

include DIR_VIEW .'upload_image.html';