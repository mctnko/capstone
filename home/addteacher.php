<?php
	session_start();
	include('../attempt/connect.php');
	
	$lname=$_POST['lname'];
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$eadd=$_POST['eadd'];
	$password=$_POST['password'];
	$id=$_POST['id'];

		$numrows = mysql_query("SELECT eadd FROM teacher WHERE eadd='$eadd'");
		$count = mysql_num_rows($numrows);
		if($count!=0)
			{
				die ("<script> alert('Email Address is already taken. Click OK to refresh. Thank you!'); window.location='../home/teacher.php?id=".$id."'; </script>");
			}

		$sql=mysql_query("INSERT INTO `teacher` (`lname`, `fname`, `mname`, `eadd`,`password`,`status`) VALUES ('".$_POST['lname']."', '".$_POST['fname']."', '".$_POST['mname']."', '".$_POST['eadd']."', '".$_POST['password']."','s')");

		echo "<script> alert('Successfully Registered! Click OK to refresh page. Thank you!'); window.location='../home/teacher.php?id=".$id."'; </script>";
?>