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
$mode = $_GET['mode'];
$page = $_GET[page];
$subject = $_POST['subject'];
$content = $_POST['content'];
$item_num = $_GET[num];

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$usernick = $_SESSION['usernick'];
if(is_uploaded_file($_FILES['upfile']['tmp_name']))
{
    $destination = "../data/" . $_FILES['upfile']['name'];
    move_uploaded_file($_FILES['upfile']['tmp_name'], $destination);
    $file_name = $_FILES['upfile']['name'];
}
mysqli_query($connect, $sql);
mysqli_close();
echo ("
<script>
location.href='list.php?page=$page';
</script>
");
?>
