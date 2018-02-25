<?php
include '../init.php';
//当前的cookie会与session重复，所以要两个都要判断，要不就一个cookie的话，会与session冲突，循环
if(isset($_COOKIE['user_id'])&&isset($_SESSION['userInfo'])){
	jump('./publish.php');
};
include DIR_VIEW.'login.html';