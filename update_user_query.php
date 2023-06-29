<?php 

	session_start();  	
	include 'includes/dbcon.php';
	
	if(isset($_POST['submit']))
	{
		$id = $_POST['idnum'];
		$uname = $_POST['uname'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mid = $_POST['mid'];
		$cat = $_POST['cat'];
		$pwd = $_POST['pwd'];
		$cpwd = $_POST['cpwd'];
		$dte = date("Y-m-d");


		if(empty($pwd) && empty($cpwd)){
		$query = "update user set fname='$fname',lname='$lname',mid='$mid',Category='$cat',uname='$uname' where IDnum='$id'";
		$result = mysqli_query($con,$query);

		if($result){
			echo 
							'<script>
								window.location.href = "update_user.php";
								alert("Details successfully updated!");
      						</script>';

		}

	}elseif(!empty($pwd) && !empty($cpwd) && $pwd===$cpwd){
		$query = "update user set fname='$fname',lname='$lname',mid='$mid',Category='$cat',uname='$uname',Password='$cpwd' where IDnum='$id'";
		$result = mysqli_query($con,$query);

		if($result){
			echo 
							'<script>
								window.location.href = "update_user.php";
								alert("Details successfully updated!");
      						</script>';
		}

	}else{
		echo 
					'<script>
						window.history.go(-1);
						alert("Password do not match!");
      				</script>';	}
		












	}			
?>