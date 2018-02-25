<?php 
include '../init.php';

//判断用户是否登录
session_start();
if(!isset($_SESSION['userInfo'])){
	jump('./login.php','请你先登录');
}


include DIR_VIEW.'publish.html';

