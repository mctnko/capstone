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
					<td>Action</td>
			</tr>
			<?php
				$id=$_GET['id'];
				$sql = "SELECT * FROM student WHERE status='Pending'";
				$result = mysql_query($sql);
				while($row=mysql_fetch_assoc($result)){
				echo"<tr><td>".$row['fname']."</td><td>".$row['lname']."</td><td>".$row['eadd']."</td><td>".$row['password']."</td><td>".$row['status']."</td><td><a href=\"../home/changestatus.php?sID=".$row['student_id']."&&tag=0&&adminID=".$id."\">Approve</a></td><td><a href=\"../home/changestatus.php?sID=".$row['student_id']."&&tag=1&&adminID=".$id."\">Reject</a></td></tr>";
														}
													
			?>
		</table> 
	</body>
</html>