<?php
	include('../attempt/connect.php');

	$classid=$_GET['classid'];
	$id=$_GET['id'];
	$scheduleid=$_GET['scheduleid'];
	
	
	$query=mysql_query("INSERT INTO `class_enrolled` (`student_id`,`class_id`,`class_schedule_id`) VALUES ('".$id."','".$classid."', '".$scheduleid."') ");
	$editpopulation=mysql_query("UPDATE `class_schedule` SET `population` = `population` + '1' WHERE class_id='".$classid."'");
	

	echo "<script> alert('Successfully Enrolled! Click OK to refresh page. Thank you!'); window.location='../home/enrollclass.php?id=".$id."'; </script>";
?>