<?php 
	//error_reporting(0);
	session_start();
	include 'includes/dbcon.php';



if(isset($_POST['submit']))
{

	$uname = trim($_POST['uname']);
	

		$validate = "SELECT * FROM user WHERE uname = '$uname' AND status='Activate' ";
		$result = mysqli_query($con, $validate);
		$rowvalidate = mysqli_fetch_array($result);

		if(mysqli_num_rows($result) > 0)
		{
			
			header('location:change_password.php');
			//$_SESSION['login_status']='valid';
			$_SESSION['id']=$rowvalidate['IDnum'];
			//$_SESSION['cat']=$rowvalidate['Category'];
			//$_SESSION['id']=$rowvalidate['ID'];
			//$_SESSION['username']=$rowvalidate['Fname'].' '.$rowvalidate['Lname'];
			//$_SESSION['pos']=$rowvalidate['Pos'];
			//$_SESSION['type']=$rowvalidate['type'];

			//$_SESSION['mid']=$rowvalidate['Middle'];
			//
			
			
			//exit(0);	
		}else
		{
			
			echo "<script>
			window.location.href='logout.php'
			alert('Invalid Account')</script>";
		
			$_SESSION['login_status'] = ['invalid'];
			
				//exit(0);	
		}
	
}
?>