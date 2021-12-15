<?php 
session_start();

$regist_day = date("Y-m-d (H:i)");
include "../../login/dbconn.php";

//$userid = $_SESSION['userid'];
$FILE_SEQ = $_POST['FILE_SEQ'];
$FILE_GROUP = $_POST['FILE_GROUP'];
$FILE_TEXT = $_POST['FILE_TEXT'];

if(is_uploaded_file($_FILES['upfile']['tmp_name']))
{
    $destination = "./" . $_FILES['upfile']['name'];
    move_uploaded_file($_FILES['upfile']['tmp_name'], $destination);
    $file_name = $_FILES['upfile']['name'];
}

$sql = "insert into Thumbnail (FILE_NAME, FILE_SEQ, FILE_GROUP, FILE_TEXT, FILE_ADMIN, REGIST_DAY)";
$sql .= "values ('$FILE_NAME', '$FILE_SEQ', '$FILE_GROUP', '$FILE_TEXT', '$FILE_ADMIN','$REGIST_DAY')";

//echo '<script>'; 
//echo 'alert("FILE_NAME : '.$FILE_NAME .'");'; 
//echo '</script>';

//mysqli_query($connect, $sql);
//mysqli_close();


?>

