<!-- EDIT BY ADMIN -->
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
							<li><a href="#">Class Offered</a></li>
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
		<!-- Main component for a primary marketing message or call to action -->
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
										  <li class='active'><a href='../home/officialstudent.php?id=".$id."'>Official Students</a></li>
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
							<?php 
								$id=$_GET['id'];
								if(sizeof($_POST))
								{							
									$newstatus=$_POST['newstatus'];					
									$student_id=$_POST['student_id'];

									$sql2=mysql_query("UPDATE  `student` set  `status`='$newstatus' WHERE `student_id`=$student_id");
													
				
									echo "<script> alert('Successfully Updated! Click OK to refresh page. Thank you!'); window.location='../home/officialstudent.php?id=".$id."'; </script>";
							
									
								}
							?>
							<?php
								$id=$_GET['id'];
								$student_id=$_GET['student_id'];
								echo'<form action="editprofile.php?student_id='.$student_id.'&&id='.$id.'" method="POST">
								<table class="table">                     
									<tr>
										<td>Students First Name</td>
										<td>Students Last Name</td>
										<td>Students Age</td>
										<td>Parents Email Address</td>									
										<td>Status</td>
										<td>Action</td>
										<td></td>
									</tr>';
							

									
									$query=mysql_query("select * from `student` where student_id = '$student_id'");
									while($row=mysql_fetch_assoc($query)){
										$user=$row['student_id'];
										$userid=mysql_query("SELECT * FROM `user` WHERE `user_id`='".$user."'");
										$showuserid=mysql_fetch_assoc($userid);
									

										echo "<tr>";
										echo "<td>".$row['fname']."</td>";
										echo "<td>".$row['lname']."</td>";
										echo "<td>".$row['age']."</td>";
										echo "<td>".$row['eadd']."</td>";										
										echo "<td>".$row['status']."</td>";
										echo "<td><select type='text' name='newstatus' class='form-control' value='".$row['status']."' required>
													<option value='Enrolled'>Enrolled</option>
													<option value='On-Hold'>On-Hold</option>
													<option value='Archive'>Archive</option></select></td>";
										echo "<input type='hidden' name='student_id' class='form-control' value='".$row['student_id']."'>";
										echo "<input type='hidden' name='user_id' class='form-control' value='".$showuserid['user_id']."'>";									
										echo "<td><button type='submit' class='btn btn-primary'>Update</button></td>";
										echo "</tr>";

										$student_id = $row['student_id'];
								   
									}
								
							?>
								</table>
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
		<script type="text/javascript">
		function aa(){
		xmlhttp=new XMLHttpRequest();
		xmlhttp.open("GET","searchofficialstudent.php?nm="+document.form1.t1.value,false);
		xmlhttp.send(null);
		document.getElementById("d1").innerHTML=xmlhttp.responseText;
		}
		</script>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>
<?php
    }
?>

