<?php

include 'mysql.php';
include 'common.php';

$id = $_GET['id'];

$del_sql = "DELETE FROM test_company where id={$id}";
$result = mysql_query($del_sql);
if($result){
	redirect('adminList.php', 2, '删除成功！');
}
