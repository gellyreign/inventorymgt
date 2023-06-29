<?php 

	//session_start();  	
include 'includes/dbcon.php';

if(isset($_POST['submit']))
{
	$id = $_POST['idnum'];
	$status = $_POST['status'];

	$query = "UPDATE user SET status='$status' WHERE IDnum = '$id'";
	$result = mysqli_query($con,$query);

	if($result)
	{
		echo 
		'<script>
		window.location.href = "manage_user.php";
		alert("Status successfully updated!");
		</script>';

	}
	else{
		echo 
		'<script>
		window.history.go(-1);
		alert("Failed to change!");
		</script>';	
	}

}			
?>