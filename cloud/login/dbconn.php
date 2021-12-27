<?php
$mysql_hostname = 'ctp-db.cr8u4ixxabbu.ap-northeast-2.rds.amazonaws.com';
$mysql_username = 'admin';
$mysql_password = '1q2w3e4r!';
$mysql_database = 'cloud_db';

$connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);
	
mysqli_select_db($connect, $mysql_database) or die('DB connection ERROR');
mysqli_query($connect, "set session character_set_connection=utf8;");
mysqli_query($connect, "set session character_set_results=utf8;");
mysqli_query($connect, "set session character_set_client=utf8;");
?>
