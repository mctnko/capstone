<?php
								include('connect.php');
								
								$fname=$_POST['fname'];
								$lname=$_POST['lname'];
								$eadd=$_POST['eadd'];
								$password=$_POST['password'];
								
								$sql=mysql_query("INSERT INTO `student` (`fname`, `lname`, `eadd`, `password`,`status`,`student_status`) VALUES ('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['eadd']."', '".$_POST['password']."', 'Pending','S')");
								
								header( 'Location: ../capstone/home.php' ) ;
							?>