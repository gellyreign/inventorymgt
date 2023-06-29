<?php 
	error_reporting(0);
	session_start();
	include 'includes/dbcon.php';


	if($_SESSION['login_status']=='invalid' || empty($_SESSION['login_status'])){
		$_SESSION['login_status'] = [' Invalid Account','alert-danger'];
		
	}

	if($_SESSION['login_status']=='valid'){
		echo "<script>window.location.href='index.php'</script>";
	}


if(isset($_POST['submit'])){

	$uname = trim($_POST['uname']);
	$pwd = $_POST['pwd'];


	if(empty($uname) || empty($pwd)){

			//$_SESSION['login_status'] = [' Please fill up all fields','alert-warning'];
		echo "<script>
		alert(Please fill up all fields','alert-warning);
		</script>";

		echo "<script>window.location.href='login.php'</script>";

	}else
	{

		$validate = "SELECT * FROM user WHERE uname = '$uname' AND Password='$pwd' AND status='Activate' ";
		$result = mysqli_query($con, $validate);
		$rowvalidate = mysqli_fetch_array($result);

		if(mysqli_num_rows($result) > 0)
		{
			
			
			$_SESSION['login_status']='valid';
			$_SESSION['id']=$rowvalidate['IDnum'];
			$_SESSION['cat']=$rowvalidate['Category'];
			$_SESSION['full']=$rowvalidate['fname'].' '.$rowvalidate['lname'];


			if($_SESSION['cat']=='Cashier'){
				header('location:cashier.php');
			}else{
				header('location:index.php');
			}
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
}
?>