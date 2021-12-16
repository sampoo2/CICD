<?php

session_start();

$REGIST_DAY = date("Y-m-d (H:i)");
include "../login/dbconn.php";

	if(is_uploaded_file($_FILES['upfile']['tmp_name']))
	{
		$destination = "../data/" . $_FILES['upfile']['name'];
		move_uploaded_file($_FILES['upfile']['tmp_name'], $destination);
		$file_name = $_FILES['upfile']['name'];
	}

	$FILE_SEQ = $_POST['FILE_SEQ'];
	$FILE_GROUP = $_POST['FILE_GROUP'];
	$FILE_TEXT = $_POST['FILE_TEXT'];
	$FILE_NAMES = $_POST['upfile'];
	$FILE_ADMIN = $_POST['FILE_ADMIN'];	

	$sql = "insert into Thumbnail (FILE_NAME, FILE_SEQ, FILE_GROUP, FILE_TEXT, FILE_ADMIN, REGIST_DAY)";
	$sql .= "values ('$FILE_NAMES', '$FILE_SEQ', '$FILE_GROUP', '$FILE_TEXT', 'admin','$REGIST_DAY')";
	
	mysqli_query($connect, $sql);
	mysqli_close();
	
?>


