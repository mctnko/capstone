<?php
	session_start();
	include('../attempt/connect.php');

	$id=$_GET['id'];
	$classid=$_GET['classid'];
	
	//$sql=mysql_query("DELETE FROM `course_schedule` WHERE `course_schedule_id`='".$courseID."'");
	$sql=mysql_query("Delete From `advised_class`  WHERE `class_id`='".$classid."'");
	
	//$getStud=mysql_query("SELECT * FROM ` student` WHERE stud_id='".$studID."'");
	//$row=mysql_fetch_assoc($getStud);


	echo "<script> alert('Successfully Deleted! Click OK to refresh page. Thank you!'); window.location='../home/enrollclass.php?id=".$id."'; </script>";
?>