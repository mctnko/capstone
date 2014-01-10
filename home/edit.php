<!-- EDIT BY USER-->
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
									   <ul><li><font color="red">Hi Student,</font><?php 
										   
											$id=$_GET['id'];
											$query=mysql_query("select * from user where user_id='".$id."'");
											while($res=mysql_fetch_assoc($query)){
												$user_id = $res['user_id'];
												$student=$res['user_id'];
												$studentid=mysql_query("SELECT * FROM `student` WHERE `student_id`='".$student."'");
												$showstudentid=mysql_fetch_assoc($studentid);
											

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
											  <li class='active'><a href='../home/student-portal.php?id=".$id."'>Account Information</a></li>
											  <li><a href='../home/enrollclass.php?id=".$id."'>Enroll Class</a></li>
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
							<?php 	
	
								if(sizeof($_POST))
								{
									$newlname=$_POST['newlname'];
									$newfname=$_POST['newfname'];
									$newage=$_POST['newage'];
									$neweadd=$_POST['neweadd'];
									$newpassword=$_POST['newpassword'];
									$newrepassword=$_POST['newrepassword'];
									$user_id=$_POST['user_id'];
									$student_id=$_POST['student_id'];
									
									
											if($newpassword==$newrepassword)
												{
													$sql2=mysql_query("UPDATE  `student` set  `lname`='$newlname', `fname` = '$newfname', `age` = '$newage',`eadd`='$neweadd',`password`='$newpassword'  WHERE `student_id`=$student_id");
													$sql=mysql_query("UPDATE  `user` set  `last_name`='$newlname', `first_name` = '$newfname', `age` = '$newage',`username`='$neweadd',`password`='$newpassword' WHERE `user_id`=$user_id");
															
														echo "<script> alert('Successfuly Updated. Click OK to refresh. Thank you!'); window.location='/capstone/home.php'; </script>";
												}	
													else
														die ("<script> alert('Password did not match. Click OK to refresh. Thank you!'); window.location='/capstone/home.php'; </script>");
								}
							?>
							<td id="tabel1">
							<?php echo "<form role='form-horizontal' action='edit.php?user_id=$user_id&&id=$id' method='POST'>"; ?>
							
						
									<div class="form-group">
										<label  class="col-sm-3 control-label">First Name</label>	
										<div class="col-sm-8">
											<input type="text" class="form-control" name="newfname" value="<?php echo $res['first_name'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-3 control-label">Last Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="newlname" value="<?php echo $res['last_name'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-3 control-label">Age</label>	
										<div class="col-sm-8">
											<input type="text" class="form-control" name="newage" value="<?php echo $res['age'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-3 control-label">Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" name="neweadd" value="<?php echo $res['username'];?>" >
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-3 control-label">Password</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="newpassword" value="<?php echo $res['password'];?>"required>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-3 control-label">Re-enter Password</label>
										<div class="col-sm-8">
											<input type="password" class="form-control" name="newrepassword" value="<?php echo $res['password'];?>" required>
										</div>
									</div>
									<input type="hidden" name="user_id" value="<?php echo $res['user_id'];?>">
									<input type="hidden" name="student_id" value="<?php echo $showstudentid['student_id'];?>">
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-10">
											</br><button class='btn btn-primary'>Update Profile</button></a>
										</div>
									</div>
									
									
								</form>
							<?php } ?>
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
