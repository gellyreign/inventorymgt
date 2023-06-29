<?php 

	//session_start();  	
	//$num = $_SESSION['id'];
	include 'includes/dbcon.php';
	
	if(isset($_POST['submit']))
	{
		$id = $_POST['idnum'];
		$pwd = $_POST['pwd'];
		$cpwd = $_POST['cpwd'];
		


		if($pwd===$cpwd)
		{
			$query = "update user set Password='$cpwd' where IDnum='$id'";
			$result = mysqli_query($con,$query);

			if($result)
			{
				echo 
							'<script>
								window.location.href = "login.php";
								alert("Details successfully updated!")
      						</script>';
			}

		}
		else
		{
			echo 
					'<script>
						window.history.go(-1);
						alert("Password do not match!");
      				</script>';	
      	}
	}			
?>