<?php 
include '../init.php';

include DIR_CORE.'MySQLDB.php';

//接收pub_id；
$pub_id = $_GET['pub_id'];

//更新点击数
if(@!$_GET['action']){
	$sql = "update publish set pub_hits = pub_hits + 1 where pub_id = $pub_id ";
	$pdo->exec($sql);
}
//将这两个表合并，查询两个名字一样的记录，合并这两条记录，且查询id为publish的为主表
$sql = "select * from publish left join user on pub_owner = user_name where pub_id=$pub_id";

$result = $pdo->query($sql);

$row = $result->fetch(PDO::FETCH_ASSOC);



//以下代码跟分页有关
//接收当前页码数
$pageNum = isset($_GET['num'])?$_GET['num']:1;

//定义每一页显示的记录数
$rowsPerPage = 5;

//查询总记录数
$sql = "select * from reply where rep_pub_id=$pub_id";
$rowCount = $pdo->query($sql)->rowCount()==0?1:$pdo->query($sql)->rowCount();
// if ($rowCount) {
// 	$rowCount = $pdo->query($sql)->rowCount();
// }else{
// 	$rowCount=1;
// }
// echo $rowCount;
// die;
//计算总页数
$pages = ceil($rowCount/$rowsPerPage);

//拼凑出页码字符串
$strPage = '';
//拼凑出“首页”
$strPage.="<a href='./show.php?num=1'>首页</a>";
//拼凑出上一页
$preNum = $pageNum==1?1:$pageNum-1;
$strPage.="<a href='./show.php?num=$preNum'><<上一页</a>";
//确定显示的第一个页码$startNum的值
if($pageNum<=3){
	$startNum=1;
}else{
	$startNum = $pageNum-2;
}
//确定$startNum的最大值
if($startNum>$pages-4){
	$startNum = $pages-4;
}
//防止$startNum出现负值
if($startNum<=1){
	$startNum = 1;
}
//确定显示的最后1个页码$endNum的值
$endNum = $startNum+4;
//防止$endNum越界
if($endNum>$pages){
	$endNum = $pages;
}
//拼凑出中间的页码
for($i = $startNum;$i<=$endNum;$i++){
	if($i==$pageNum){
		$strPage.="<a href='./show.php?num=$i'><font color = 'red'>$i</a>";
	}
	else{
		$strPage.="<a href='./show.php?num=$i'>$i</a>";
	}
}

//拼凑出“下一页”
$nextNum = $pageNum ==$pages?$pages:$pageNum+1;
$strPage .="<a href='./show.php?num=$nextNum'>下一页>></a>";
//拼凑出“尾页”
$strPage .="<a href = './show.php?num=$pages'>尾页</a>";
//拼凑出"总页数"
$strPage.="总页数：$pages";

//提取publish表的数据
$offset = ($pageNum-1)*$rowsPerPage;
// $sql = "select * from publish order by pub_time desc limit $offset , $rowsPerPage";




//回帖的资源结果集
$rep_sql = "select * from reply left join user on rep_user = user_name where rep_pub_id=$pub_id order by rep_time limit $offset , $rowsPerPage";
$rep_result = $pdo->query($rep_sql);

$num_sql = "select count(*) as rep_num from reply where rep_pub_id = $pub_id";
$num_row = $pdo->query($num_sql)->fetch(PDO::FETCH_ASSOC);
$rep_num = $num_row['rep_num'];

include DIR_VIEW.'show.html';