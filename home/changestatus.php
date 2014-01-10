<?php
	include('../attempt/connect.php');

	$studentID=$_GET['sID'];
	$tag=$_GET['tag'];
	$adID=$_GET['adminID'];

	echo $tag;
	if($tag==0){
	$editstatus=mysql_query("UPDATE `student` SET status='Enrolled' WHERE student_id='".$studentID."'");
	$getStud=mysql_query("SELECT * FROM `student` WHERE student_id='".$studentID."' ");
	$row=mysql_fetch_assoc($getStud);


	$query=mysql_query("INSERT INTO `user` (`user_id`,`last_name`,`first_name`,`status`,`username`,`password`) VALUES ('".$studentID."','".$row['lname']."','".$row['fname']."','".$row['student_status']."','".$row['eadd']."', '".$row['password']."') ");
	
	}
	else
		$editstatus=mysql_query("UPDATE `student` SET status='Deleted' WHERE student_id='".$studentID."'");

	//header("location:javascript://history.go(-1)");

	echo "<script> alert('Successful! Click OK to refresh page. Thank you!'); window.location='../home/adminhome.php?id=".$adID."'; </script>";
?>