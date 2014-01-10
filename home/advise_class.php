<?php
	include('../attempt/connect.php');

	$userID=$_GET['id'];
	$classid=$_GET['classid'];
	
	$query=mysql_query("INSERT INTO `advised_class` (`student_id`,`class_id`) VALUES ('".$userID."','".$classid."') ");
	
	

	echo "<script> alert('Successful! Click OK to refresh page. Thank you!'); window.location='../home/enrollclass.php?id=".$userID."'; </script>";
?>