<?php
	session_start();
	include('../attempt/connect.php');

	$classID=$_GET['classID'];
	$id=$_GET['id'];

	echo $classID;
	
	$sql=mysql_query("UPDATE `class_schedule` SET `status`='Okay' WHERE `class_schedule_id`='".$classID."'");
	
	

	
	echo "<script> alert('Successfully Restored! Click OK to refresh page. Thank you!'); window.location='../home/class-schedule.php?id=".$id."'; </script>";
?>