<?php
	session_start();
	if(isset($_POST['login_submit'])){	

	include('connect.php');
	
	$sql=mysql_query("select user_id, username, password, status from user where username='".$_POST['username']."' and password='".$_POST['password']."' ");

	if($row=mysql_fetch_assoc($sql)){
		$_SESSION['log']=1;
		$_SESSION['id']=$row['user_id'];
		$status=$row ['status'];
		

		if ($status=='a'){
			//echo $status;
			//echo"admin";
		//echo "successful";
		header('location:../home/adminhome.php?id='.$row['user_id']);
	}
		else{
			echo $_SESSION['log'];
		//echo $status;
		//echo $row['user_id'];
		//echo "successful";
		header('location:../home/student-portal.php?id='.$row['user_id']);
			$id=$row['user_id'];
			echo" $id";
		//ssecho"<meta http-equiv='refresh' content='0;./home/student-portal.php?id=".$id.">";
	}
		
	}
	else{
		//header('location:home.php?tag=1');
		echo"<meta http-equiv='refresh' content='0;../home.php?tag=1'>";
	}
}
?>