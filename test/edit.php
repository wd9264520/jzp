<?php

include 'mysql.php';

$id = $_POST['id'];
$title = $_POST['title'];
$phone = $_POST['phone'];
$times = $_POST['times'];//间隔多少分钟预约一次
$name = $_POST['name'];
$content = $_POST['content'];
//$address = $_POST['address'];
$create_time = date("Y-m-d H:i:s");
$service_date = $_POST['service_date'];
$firsttime = $_POST['firsttime'];
$lasttime = $_POST['lasttime'];

$interval_times_arr = [];//统计时间段之间每隔几分钟有多少个时刻
$all_times_arr = [];
for($i = 0; $i < count($firsttime); $i++){
	$interval_times_arr[] = (strtotime($lasttime[$i]) - strtotime($firsttime[$i])) / ($times * 60);
}
for($j = 0; $j < count($interval_times_arr); $j++){
	for($k = 0; $k <= $interval_times_arr[$j]; $k++){
		$all_times_arr[$firsttime[$j].'-'.$lasttime[$j]][] = date("H:i:s", strtotime($firsttime[$j]) + $k * ($times * 60));
	}
}
$all_times = json_encode($all_times_arr);

$updateSql = "UPDATE test_company SET title='{$title}',phone='{$phone}',times={$times},name='{$name}',content='{$content}',service_time='{$all_times}' WHERE id={$id}";
$result = mysql_query($updateSql);
if($result){
	$delSql = "DELETE FROM test_date WHERE company_id={$id}";
	mysql_query($delSql);
	foreach($service_date as $v){
		$insertDate = "INSERT INTO test_date(service_date,company_id) VALUES('$v','$id')";
		$obj_date = mysql_query($insertDate);
	}
	if($obj_date){
		echo json_encode(array('code' => 200));
	}else{
		echo json_encode(array('code' => 404));
	}
}else{
	echo json_encode(array('code' => 404));
}