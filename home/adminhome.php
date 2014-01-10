<!DOCTYPE html>
<html lang="en">
<?php
     include('../attempt/connect.php');
     session_start();
    if($_SESSION['log']==0){
        header('location:../home.php');}
    else{
?>	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../ico/great.png">

		<title>Great Children Learning Hub</title>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.css" rel="stylesheet">
		<!-- Custom styles for this template -->
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
						<a class="navbar-brand" href="../index.php">Great Children's Learning Hub</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="../home.php">Home</a></li>
							<li><a href="../classes.php">Class Offered</a></li>
							<li><a href="../contact.html">Contact</a></li>
							<li><a href="../aboutus.html">About</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<label class="header">
									   <ul><li><font color="red">Hi Admin,</font><?php 
										   
											$id=$_GET['id'];
											$query=mysql_query("select * from user where user_id='".$id."'");
											if($res=mysql_fetch_assoc($query))
												echo "<font color='red'>  ".$res['first_name']." ".$res['last_name']."! </font>";
										?></li></ul>
									</label> <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href='../attempt/logout.php'>Logout</a></li>
								</ul>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		<div class="container">
			<div id="home">
				<table  id="welcome2" border="0" cellspacing="0" cellpadding="0" style="width:100%;" class="col-md-12">
						<tbody>
						<tr valign="top">
							<td id="tabel1">
								<?php
								$id=$_GET['id'];								
								echo "<div class='masthead'>
										<ul class='nav nav-justified'>
										  <li class='active'><a href='../home/adminhome.php?id=".$id."'>Pending Request</a></li>
										  <li><a href='../home/officialstudent.php?id=".$id."'>Official Students</a></li>
										  <li><a href='../home/class-schedule.php?id=".$id."'>Class Offered</a></li>
										  <li><a href='../home/deletedclasses.php?id=".$id."'>Removed Class</a></li>
										  <li><a href='../home/teacher.php?id=".$id."'>Teacher Information</a></li>
										</ul>
									</div>"
								?>
							</td>		
						</tr>
					</tbody>
				</table>
				<table id="welcome" border="0" cellspacing="0" cellpadding="0" style="width:100%;" class="col-md-12">
					<tbody>
						<tr valign="top">
							<td id="tabel1">
								<table class="table">
									<tr>
										<td>Student's First Name</td>
										<td>Student's Last Name</td>
										<td>Parent's Email Address</td>
										<td>Status</td>
										<td>Action</td>
										<td>Action</td>
									</tr>
									<?php
											$id=$_GET['id'];
											$sql = "SELECT * FROM student WHERE status='Pending'";
											$result = mysql_query($sql);
											while($row=mysql_fetch_assoc($result)){
												echo"<tr>
														<td>".$row['fname']."</td>
														<td>".$row['lname']."</td>
														<td>".$row['eadd']."</td>
														<td>".$row['status']."</td>
														<td><a href=\"../home/changestatus.php?sID=".$row['student_id']."&&tag=0&&adminID=".$id."\">Approve</a></td>
														<td><a href=\"../home/changestatus.php?sID=".$row['student_id']."&&tag=1&&adminID=".$id."\">Reject</a></td></tr>";
											}
										
									?>
								</table> 
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
<?php
    }
?>

