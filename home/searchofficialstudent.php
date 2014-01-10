<html>
	<body>
		<?php
			include("../attempt/connect.php");
			$id=$_GET['id'];
			$nm = "";
			if(isset ($_GET['nm'])){
				$nm = $_GET['nm']; 
			}
			$min_length = 3;
			if($nm=="")
			{
				include ('official.php');

			}
			else
			{
				if(strlen($nm) >= $min_length){ 
					 
					$nm = htmlspecialchars($nm); 
					$nm = mysql_real_escape_string($nm);
					$raw_results = mysql_query("SELECT * FROM student WHERE (`fname` LIKE '%".$nm."%') OR (`lname` LIKE '%".$nm."%') OR (`eadd` LIKE '%".$nm."%') OR (`status` LIKE '%".$nm."%')") or die(mysql_error());
				
				
					if(mysql_num_rows($raw_results) > 0){
						echo "<table class='table' >
							<tr>
							<td>First Name</td>
							<td>Last Name Name</td>
							<td>Email Address</td> 
							<td>Password</b></td> 
							<td>Status</td>  
							<td>Action</td>
							</tr>";
					while($results = mysql_fetch_array($raw_results)){
					
					$student_id = $results['student_id'];			
							
							
							echo "<tr>";
							echo "<td>" .$results['fname']. "</td>";
							echo "<td>" .$results['lname']. "</td>";
							echo "<td>" .$results['eadd']. "</td>";
							echo "<td>" .$results['password']. "</td>";
							echo "<td>" .$results['status']. "</td>";
							echo "<td><a href='editprofile.php?stud_id=$student_id&&id=$id'><button class='btn btn-primary'>Edit</button></a></td>"; 
							echo "</tr>";
							
							
							}
						}
					else{
					
						echo "</br>No <b>".$nm."</b> Found.</br>";

					}
				
				}
				else{
					echo "Minimum length is ".$min_length;
				}
				echo "</table>"; 
			}
		?>
	</body>
</html>