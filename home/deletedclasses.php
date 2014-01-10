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
										  <li><a href='../home/adminhome.php?id=".$id."'>Pending Request</a></li>
										  <li><a href='../home/officialstudent.php?id=".$id."'>Official Students</a></li>
										  <li><a href='../home/class-schedule.php?id=".$id."'>Class Offered</a></li>
										  <li class='active'><a href='../home/deletedclasses.php?id=".$id."'>Removed Class</a></li>
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
							<table>
								<tr>
									
									<table class="table"><br/>
										<tr><td>Class</td><td>Teacher</td><td>Schedule</td><td>Classroom</td><td>Action</td></tr>
										<?php
												$id=$_GET['id'];
												$sql=mysql_query("SELECT * FROM `class_schedule` where status='Delete'");
											   
												while($schedule=mysql_fetch_assoc($sql)){
													$class_schedule_id=$schedule['class_schedule_id'];
													$class=$schedule['class_id'];
													$teacher=$schedule['teacher_id'];
													$category=mysql_query("SELECT * FROM `class_category` WHERE `class_id`='".$class."'");
													$showcategory=mysql_fetch_assoc($category);
													$teachers=mysql_query("SELECT * FROM `teacher` WHERE `teacher_id`='".$teacher."'");
													$showteacher=mysql_fetch_assoc($teachers);
													echo"<tr>
														<td><div style='text-align:left'>".$showcategory['class_level']."</div></td>
														<td><div style='text-align:left'>".$showteacher['fname']." ".$showteacher['mname'].". ".$showteacher['lname']."</div></td>
														<td><div style='text-align:left'>".$schedule['day']." ".$schedule['time']."</div></td>
														<td><div style='text-align:left'>".$schedule['classroom']."</div></td>
														<td><a href='./restore_class.php?classID=".$class_schedule_id."&id=".$id."'><button class='btn btn-primary'>Restore</button></td>
														
													</tr>";
												}
											
										   ?>
									</table>
								</tr>
								
							</table>
							</td>
						</tr>
					</tbody>
				</table>
				
			</div>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Add Class</h4>
						</div>
						<div class="modal-body">
							<table class="table">
								<tr>
									<form method="post" action="add_class.php">
									<tr>
										<td>Class Category:</td>
										<td><select name="class"  class="form-control" required>
											<option> -Select Class Level- </option>
												<?php
													$id=$_GET['id'];
													$sql=mysql_query("SELECT * FROM `class_category`");

													while($class=mysql_fetch_assoc($sql)){
													echo"<option value='".$class['class_id']."'>".$class['class_level']."</option>";
													//echo"<input type=\"hidden\" value='".$class['course_id']."' name=\"courseID\">";
													}
															
													echo"<input type='hidden' value='".$id."' name='id'>";?>
											</select>
										</td>
									</tr>
								</tr>
								<tr>
									<td>Teacher Name:</td>
									<td><select name="teacher"  class="form-control" required>
										<option> -Select Teacher- </option>
											<?php
												$sql2=mysql_query("SELECT * FROM `teacher`");
												while($teacher=mysql_fetch_assoc($sql2)){
											
													echo"<option value='".$teacher['teacher_id']."'>".$teacher['fname']." ".$teacher['lname']."</option>";
													//echo"<input type=\"hidden\" value='".$teacher['instructor_id']."' name=\"instID\">";
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Class Schedule:</td>
									<td><input type="text" placeholder="Time" class="form-control" name="time" required></input></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="text" placeholder="Day" class="form-control" name="day" required></input></td>
								</tr>
								<tr>
									<td>Class Room</td>
									<td><select name="classroom"  class="form-control" required>
										<option> -Select Class Room- </option>
										<option value='Class 1'>Class 1</option>
										<option value='Class 2'>Class 2</option>
										<option value='Class 3'>Class 3</option>
																	
										</select>
									</td>
								</tr>
										
							</table>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Add Class</button>
							</form>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
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

