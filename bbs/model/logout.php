<?php 
include '../init.php';
setcookie('user_id','',time()-1,'/');
session_start();
$_SESSION = array();
session_destroy();
jump('../index.php','注销成功');