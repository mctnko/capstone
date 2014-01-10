<?php
	session_start();
	include('../attempt/connect.php');

	$classID=$_GET['classID'];
	$id=$_GET['id'];

	echo $classID;
	//$sql=mysql_query("DELETE FROM `course_schedule` WHERE `course_schedule_id`='".$courseID."'");
	$sql=mysql_query("UPDATE `class_schedule` SET `status`='Delete' WHERE `class_schedule_id`='".$classID."'");
	
	//$getStud=mysql_query("SELECT * FROM ` student` WHERE stud_id='".$studID."'");
	//$row=mysql_fetch_assoc($getStud);


	echo "<script> alert('Successfully Deleted! Click OK to refresh page. Thank you!'); window.location='../home/deleteclass.php?id=".$id."'; </script>";
?>