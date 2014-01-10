<html>
	<body>
	
		<table class="table">
			<tr>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Email Address</td>
				<td>Password</td>
				<td>Status</td>
				<td>Action</td>
			</tr>
				<?php
					$id=$_GET['id'];
					$sql = "SELECT * FROM student WHERE status='Approved'";
					$result = mysql_query($sql);
					while($row=mysql_fetch_assoc($result)){
					$student_id = $row['student_id'];
					echo"<tr>
					<td>".$row['fname']."</td>
					<td>".$row['lname']."</td>
					<td>".$row['eadd']."</td>
					<td>".$row['password']."</td>
					<td>".$row['status']."</td>
					<td><a href='editprofile.php?stud_id=$student_id&&id=$id'><button class='btn btn-primary'>Edit</button></a></td></tr>";
					}
										
				?>
		</table> 
	</body>
</html>