<?php 
session_start();

if(! $_SESSION['userid']) {
	echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
	exit;
}

$regist_day = date("Y-m-d (H:i)");
include "../../login/dbconn.php";

$userid = $_SESSION['userid'];
$FILE_SEQ = $_POST['FILE_SEQ'];
$FILE_GROUP = $_POST['FILE_GROUP'];
$FILE_TEXT = $_POST['FILE_TEXT'];

if(is_uploaded_file($_FILES['upfile']['tmp_name']))
{
    $destination = "../data/" . $_FILES['upfile']['name'];
    move_uploaded_file($_FILES['upfile']['tmp_name'], $destination);
    $file_name = $_FILES['upfile']['name'];
}

$sql = "insert into greet (FILE_NAME, FILE_SEQ, FILE_GROUP, FILE_TEXT, FILE_ADMIN, REGIST_DAY)";
$sql .= "values ('$FILE_NAME', '$FILE_SEQ', '$FILE_GROUP', '$FILE_TEXT', '$userid','$REGIST_DAY')";

mysqli_query($connect, $sql);
mysqli_close();
echo ("
<script>
location.href='list.php?page=$page';
</script>
");
?>
