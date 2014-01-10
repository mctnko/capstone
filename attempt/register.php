<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../ico/great.png">

		<title>Register | Great Children Learning Hub</title>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="../css/carousel.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<link href="../css/not.css" rel="stylesheet">
	</head>

	<body>
		<div id="wrap">
			<!-- Fixed navbar -->
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="/capstone">Great Children's Learning Hub</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="../home.php">Home</a></li>
							<li><a href="../classes.php">Class Offered</a></li>
							<li><a href="../contact.html">Contact</a></li>
							<li><a href="../about.html">About</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Enroll <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="register.php">Fill up Application Form</a></li>
									<li><a href="../home.php">Log in</a></li>
								</ul>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		<div class="container">
		<!-- Main component for a primary marketing message or call to action -->
			<div id="home">
				<table id="welcome" border="0" cellspacing="0" cellpadding="0" style="width:100%;" class="col-md-12">
					<tbody>
						<tr valign="top">
							<td id="tabel1">
								<center><img src="../images/board.png" /></center>
							</td>
							<?php
								include('connect.php');
								if(sizeof($_POST)){
									$fname=$_POST['fname'];
									$lname=$_POST['lname'];
									$age=$_POST['age'];
									$eadd=$_POST['eadd'];
									$password=$_POST['password'];
									$repassword=$_POST['repassword'];
									
									$numrows = mysql_query("SELECT eadd FROM student WHERE eadd='$eadd'");
									$count = mysql_num_rows($numrows);
									if($count!=0)
									{
										die ("<script> alert('Email Address is already taken. Click OK to refresh. Thank you!'); window.location='/capstone/attempt/register.php'; </script>");
									}
									if($password==$repassword)
									{
										$sql=mysql_query("INSERT INTO `student` (`fname`, `lname`, `age`, `eadd`, `password`,`status`,`student_status`) VALUES ('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['age']."','".$_POST['eadd']."', '".$_POST['password']."', 'Pending','S')");
										
										echo "<script> alert('Successfully Registered! Settle first your enrollment downpayment within one week for your account to be activated. Click OK to view for tuition. Thank you!'); window.location='/capstone/classes.php'; </script>";
									}
									else
										echo "<script> alert('Password did not match. Click OK to refresh. Thank you!'); window.location='/capstone/attempt/register.php'; </script>";
									
								}
							?>
							<td id="tabel">
								<form role="form" action="register.php" method="POST">
									<h3>Fill-up Application Form!</h3>
									<div class="form-group">
										<input type="text" class="form-control" name="fname" placeholder="Child's First Name" required>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="lname" placeholder=" Child's Last Name" required>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="age" placeholder="Child's Age" required>
									</div>
									<div class="form-group">
										<input type="email" class="form-control" name="eadd" placeholder="Email Address" required>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="password" placeholder="Password" required>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="repassword" placeholder="Re-enter Password" required>
									</div>
									
									<button class="btn btn-primary" type="submit">Submit</button>
									
								</form>
							</td>
							
						</tr>
					</tbody>
				</table>
			
			</div>
		</div>
		</div>
	
		<div id="footer">
		  <div class="container">
			<p class="text-muted">Developed by <a href="https://www.facebook.com/dmdiana">Dean</a> & <a href="https://www.facebook.com/mctnko">Ariel</a></p>
		  </div>
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>
