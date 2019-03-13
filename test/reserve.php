<?php

include 'mysql.php';

$title = $_POST['title'];
$phone = $_POST['phone'];
$times = $_POST['times'];//间隔多少分钟预约一次
$name = $_POST['name'];
$content = $_POST['content'];
$address = $_POST['address'];
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

//准备sql语句
$selectSql = "SELECT id FROM test_company WHERE title='{$title}'";
$result_num = mysql_query($selectSql);
if(mysql_num_rows($result_num) > 0){
	echo json_encode(array('code' => 401, 'msg' => 'no'));
	die;
}

$insertSql = "INSERT INTO test_company(title, name, phone, times, `number`, content, service_time, create_time) VALUES('$title', '$name', '$phone', '$times', '0', '$content', '$all_times', '$create_time')";

//发送sql语句
$obj = mysql_query($insertSql);
if($obj){
	$id = mysql_insert_id($connection);
	foreach($service_date as $v){
		$insertDate = "INSERT INTO test_date(service_date,company_id) VALUES('$v','$id')";
		$obj_date = mysql_query($insertDate);
	}
	foreach($address as $val){
		$insertAddress = "INSERT INTO test_address(address,company_id) VALUES('$val','$id')";
		mysql_query($insertAddress);
	}
	if($obj_date){
		echo json_encode(array('code' => 200, 'msg' => 'ok'));
	}else{
		echo json_encode(array('code' => 404, 'msg' => 'no'));
	}
}else{
	echo json_encode(array('code' => 404, 'msg' => 'no'));
}
