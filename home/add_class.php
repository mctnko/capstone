<?php
	session_start();
	include('../attempt/connect.php');

	$class=$_POST['class'];
	$time=$_POST['time'];
	$day=$_POST['day'];
	$classroom=$_POST['classroom'];
	$teacher=$_POST['teacher'];
	$id=$_POST['id'];

	$sql=mysql_query("INSERT INTO `class_schedule` (`class_id`, `time`, `day`, `population`,`classroom`, `teacher_id`, `status`) VALUES ('".$_POST['class']."', '".$_POST['time']."', '".$_POST['day']."', '0', '".$_POST['classroom']."', '".$_POST['teacher']."', 'Okay')");
	
	echo "<script> alert('Added Class Complete! Click OK to refresh page. Thank you!'); window.location='../home/class-schedule.php?id=".$id."'; </script>";
	

?>