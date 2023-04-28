<?php
require('dbconn.php');

?>
<?php
include 'admin/validity.php';
?>
<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>Inventory Management System </title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>INVENTORY MANAGEMENT SYSTEM </h1>

	<div class="container">

		<div class="login">
			<h2>Sign In</h2>
			<form action="index.php" method="post">
				<input type="text" Name="IDnum" placeholder="ID number" required="">
				<input type="password" Name="Password" placeholder="Password" required="">
			
			
			<div class="send-button">
				<!--<form>-->
					<input type="submit" name="signin" value="Sign In">
			
				</form>
				<h3>Don't have an account?<a href="register.php">Create account.</a></h3>
			</div>
			
			<div class="clear">
			</div>
		</div>
		</div>

		
			

<?php
if(isset($_POST['signin']))
{$u=$_POST['IDnum'];
 $p=$_POST['Password'];
 

 $sql="select * from ims.user where IDnum='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Category'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['IDnum']=$u;
  }
 if ($y == "admin") {
	 $_SESSION['Category']=$y;
	echo header("Location:admin/dashboard.php");

}
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect IDNo or Password')</script>";
}
   

}


?>

</body>
<!-- //Body -->
<script src="css/index.js"></script>
</html>
