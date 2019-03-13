<?php

/*
	用户预约接口
*/

include 'mysql.php';

$phone = $_POST['user_phone'];
$remark = $_POST['remark'];
$subscribe_time = '2019-'.$_POST['select_date'].' '.$_POST['select_time'];//$_POST['subscribe_time'];
$company_id = $_POST['company_id'];
$create_time = date("Y-m-d H:i:s");

//判断预约时间是否在正确的时间内
if($subscribe_time < date("Y-m-d H:i:s")){
	echo json_encode(array('code' => '401', 'msg' => '预约时间不在当前时间内'));
	die;
}

//判断某个时间段的预约是否满了
$sql = "SELECT * FROM test_user WHERE company_id={$company_id} and subscribe_time='{$subscribe_time}'";
$result = mysql_query($sql);
$number = $result -> num_rows;
if($number >= 2){
	echo json_encode(array('code' => '201', 'msg' => '该点的预约已满'));
}else{
	$insert = "INSERT INTO test_user(phone,remark,subscribe_time,company_id,create_time) VALUES('$phone','$remark','$subscribe_time','$company_id','$create_time')";
	$obj = mysql_query($insert);
	
	if($obj){
		$sql_company = "SELECT number FROM test_company WHERE id={$company_id}";
		$result_company = mysql_query($sql_company);
		$number = mysql_fetch_assoc($result_company);
		$up_number = $number['number'] + 1;
		$update_company = "UPDATE test_company SET number={$up_number} where id={$company_id}";
		mysql_query($update_company);
		echo json_encode(array('code' => '200', 'msg' => 'success'));
	}else{
		echo json_encode(array('code' => '404', 'msg' => 'error'));
	}
}