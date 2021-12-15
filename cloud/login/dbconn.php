<?php
$mysql_hostname = '10.0.2.211';
$mysql_username = 'cloudadmin';
$mysql_password = 'cloud';
$mysql_database = 'cloud_db';

$connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);
	
mysqli_select_db($connect, $mysql_database) or die('DB connection ERROR');
?>
