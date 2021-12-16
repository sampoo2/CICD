<?php
	if(is_uploaded_file($_FILES['upfile']['tmp_name']))
	{
		$destination = "/var/www/html/cloud/admin/bak/" . $_FILES['upfile']['name'];
		move_uploaded_file($_FILES['upfile']['tmp_name'], $destination);
		$file_name = $_FILES['upfile']['name'];
	}
?>


