<?php

session_start();

$REGIST_DAY = date("Y-m-d (H:i)");
include "../login/dbconn.php";

$FILE_SEQ = $_POST['FILE_SEQ'];
$FILE_GROUP = $_POST['FILE_GROUP'];
$FILE_TEXT = $_POST['FILE_TEXT'];
$FILE_NAME = $_FILES['upfile']['name'];
$FILE_ADMIN = $_POST['FILE_ADMIN'];	

	if(is_uploaded_file($_FILES['upfile']['tmp_name']))
	{
		$destination = "../data/" . $_FILES['upfile']['name'];
		move_uploaded_file($_FILES['upfile']['tmp_name'], $destination);
		$file_name = $_FILES['upfile']['name'];
	}



	$sql = "insert into Thumbnail (FILE_NAME, FILE_SEQ, FILE_GROUP, FILE_TEXT, FILE_ADMIN, REGIST_DAY)";
	$sql .= "values ('$FILE_NAME', '$FILE_SEQ', '$FILE_GROUP', '$FILE_TEXT', 'admin','$REGIST_DAY')";
	
	mysqli_query($connect, $sql);
	mysqli_close();
	
//	echo "<h2>파일 정보</h2>
//	<ul>
//		<li>sql: $sql</li>
//		<li>regist_day: $REGIST_DAY</li>
//		<li>FILE_NAME: $FILE_NAME</li>
//		<li>파일형식: {$_FILES['myfile']['type']}</li>
//		<li>파일크기: {$_FILES['myfile']['size']} 바이트</li>
//	</ul>";	
?>


