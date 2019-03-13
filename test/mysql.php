<?php
date_default_timezone_set('PRC'); //设置中国时区 

$host = 'localhost';
$database = 'jzp';
$username = 'root';
$password = 'root';

$connection = @mysql_connect($host, $username, $password);//连接数据库
mysql_query("set name 'utf8'");//编码转化
if (!$connection) {
    die("could not connect to the database.\n" . mysql_connect_error());//诊断连接错误
}
$selectedDb = mysql_select_db($database);//连接数据库
if (!$selectedDb) {
    die("could not to the database\n" . mysql_connect_error());
}