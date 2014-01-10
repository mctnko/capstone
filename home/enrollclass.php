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
						<a class="navbar-brand" href="/capstone">Great Children's Learning Hub</a>
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
									   <ul><li><font color="red">Hi Student,</font><?php 
										   
											$id=$_GET['id'];
											$query=mysql_query("select * from user where user_id='".$id."'");
											if($res=mysql_fetch_assoc($query))
												$user_id = $res['user_id'];
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
		<!-- Main component for a primary marketing message or call to action -->
			<div id="home">
				<table id="welcome2" border="0" cellspacing="0" cellpadding="0" style="width:100%;" class="col-md-12">
						<tbody>
						<tr valign="top">
							<td id="tabel1">
								<?php
									$id=$_GET['id'];								
									echo "<div class='masthead'>
											<ul class='nav nav-justified'>
											  <li><a href='../home/student-portal.php?id=".$id."'>Account Information</a></li>
											  <li class='active'><a href='../home/enrollclass.php?id=".$id."'>Enroll Class</a></li>
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
								<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Advise Class</button></br></br>
								<h4>Advised Class</h4>
								<table class="table">
									<tr>
										<td>Class</td>
										<td>Time</td>
										<td>Day</td>
										<td>Classroom</td>
										<td>Population</td>
										<td>Action</td>
										<td>Action</td>
									</tr>
									<?php
							
									$sql = "Select t1.class_id, t2.class_level, t3.class_schedule_id, t3.time,t3.day,t3.population,t3.classroom,t3.status From advised_class AS t1, class_category AS t2, class_schedule AS t3
											WHERE t1.student_id = $id AND t2.class_id = t1.class_id AND t3.class_id = t1.class_id AND t3.status = 'Okay'";
								
									$result = mysql_query($sql);
											while($row=mysql_fetch_assoc($result)){
												echo"<tr>
														<td>".$row['class_level']."</td>
														<td>".$row['time']."</td>
														<td>".$row['day']."</td>
														<td>".$row['classroom']."</td>
														<td>".$row['population']."/10</td>
														<td><a href='enroll_class.php?id=".$id."&&classid=".$row['class_id']."&&scheduleid=".$row['class_schedule_id']."'>Enroll</a></td>
														<td><a href='./delete_advised.php?id=".$id."&&classid=".$row['class_id']."'><input type='image' src='../images/recycle_bin.png' class='resize' title='Delete'></td></tr>";
														
											}		
										
									?>
								</table>
							</td>

						</tr>
					</tbody>
				</table>
				<table id="welcome2" border="0" cellspacing="0" cellpadding="0" style="width:100%;" class="col-md-12">
						<tbody>
						<tr valign="top">
							<td id="tabel1">
								<h4>Enrolled Class</h4>
								<table class="table" style="border:1px solid white;">
									<tr style="background-color:white; color:black;">
										<td>Class</td>
										<td>Time</td>
										<td>Day</td>
										<td>Classroom</td>
									</tr>
									<?php
									$enrolled= "Select t1.class_level, t2.*, t3.* from class_category as t1 inner join class_enrolled as t2 on t2.class_id=t1.class_id 
													inner join class_schedule as t3 on t2.class_schedule_id=t3.class_schedule_id  where t2.student_id= $id";

									$classE = mysql_query($enrolled);
											while($fetch=mysql_fetch_assoc($classE)){
												echo"<tr>
														<td>".$fetch['class_level']."</td>
														<td>".$fetch['time']."</td>
														<td>".$fetch['day']."</td>
														<td>".$fetch['classroom']."</td>";
	
														
											}	
									echo"<a href='../home/pdf_student.php?id=".$id."'><br/><img src='/capstone/images/pdf.png' width='50px'></img></a> </br>";				
										
									?>
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
							<h4 class="modal-title" id="myModalLabel">Advise Class</h4>
						</div>
						<div class="modal-body">
							<table class="table">
									<tr>
										<td>Classes</td>
									
										<td>Action</td>
									</tr>
										<?php
											$sql = "SELECT * FROM class_category Where age_1=".$res['age']." Or age_2=".$res['age']." Or age_3=".$res['age']." Or age_4=".$res['age']." Or 
													age_5=".$res['age']." Or age_6=".$res['age']." Or age_7=".$res['age']." Or age_8=".$res['age']." ";
											$result = mysql_query($sql);
											while($row=mysql_fetch_assoc($result)){
											$class_id = $row['class_id'];
											echo
											"<tr>
												<td>".$row['class_level']."</td>
												
												<td><a href='advise_class.php?id=".$id."&&classid=".$row['class_id']."'>Advise Class</a></td>
												
											</tr>";
											}
																
										?>
								</table> 
						</div>
						<div class="modal-footer">
						
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

