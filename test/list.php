<?php

/*
	返回前端页面所需的数据
*/

include 'mysql.php';

$company_id = $_GET['id'];
$date = date("Y-m-d");

$sql_company = "SELECT name,title,phone,times,number,content,address,service_time FROM test_company where id={$company_id}";
$result_company = mysql_query($sql_company);
$company_arr = mysql_fetch_assoc($result_company);

$sql_date = "SELECT service_date FROM test_date where company_id={$company_id} and service_date>='{$date}'";
//echo $sql_date;
$result_date = mysql_query($sql_date);
$date_arr = [];
while($row = mysql_fetch_assoc($result_date)){
	$date_arr[] = $row['service_date'];
}
$company_arr['service_date'] = $date_arr;

$sql_address = "SELECT address FROM test_address where company_id={$company_id}";
$result_address = mysql_query($sql_address);
$address_arr = [];
while($row_address = mysql_fetch_assoc($result_address)){
	$address_arr[] = $row_address['address'];
}
$company_arr['address'] = $address_arr;

echo json_encode($company_arr);

