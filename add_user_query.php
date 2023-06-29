<?php 
	session_start();  	
	include 'includes/dbcon.php';

	if(isset($_POST['submit']))
	{
		$uname = $_POST['uname'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mid = $_POST['mid'];
		$cat = $_POST['cat'];
		$cpwd = "1234";
		$dte = date("Y-m-d");
		
		$validate = "select * from user where uname = '$uname'";
		$result = mysqli_query($con, $validate);
		
		if(mysqli_num_rows($result) > 0){
			echo 
				'<script>
					alert("Username already exist");
      				window.history.go(-1)
      			</script>';

		}
		else
		{

				$query="insert into user(fname,lname,mid,Category,uname,Password,date_added) values('$fname','$lname','$mid','$cat','$uname','$cpwd','$dte')";
				$result = mysqli_query($con,$query);
					
					if($result)
					{	

						echo 
							'<script>
								window.location.href = "add_user.php";
								alert("User successfully registered!");
      						</script>';

					}
			
		}
	}			
?>