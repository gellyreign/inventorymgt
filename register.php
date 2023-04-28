<?php
require('dbconn.php');
$sql1="select IDnum from ims.user ORDER BY IDnum DESC LIMIT 1";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();
$x=$row['IDnum'];
$x+=1;

?>
<?php
include 'validity.php';
?>

<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>Inventory Management System</title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

	

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>INVENTORY MANAGEMENT SYSTEM </h1>

	<div class="container2">

		<div class="register">
			<h4>Register</h4>
			<form action="register.php" method="post">
				<input type="text" Name="IDnum" placeholder="ID number: <?php echo $x;?>" readonly>
				<input type="text" Name="Name" placeholder="Name" required>
				<input type="password" Name="Password" placeholder="Password" required>
				
				<p>Category:</p><select name="Category" id="Category" style="background-color: dimgray;">
					<option value="admin">admin</option>
					<option value="owner">owner</option>
					<option value="employee">employee</option>
					
				</select>
				<br><br>
			<div class="send-button">
			    <input type="submit" name="signup" value="Register">
			    </form>
			</div>
			<p>By creating an account, you agree to our <a class="underline" href="terms1.html">Terms</a></p>
			<div class="clear"></div>
		</div>

		<div class="clear"></div>

	</div>

	

<?php


if(isset($_POST['signup']))
{
	$IDnum=$x;
	$name=$_POST['Name'];
	$category=$_POST['Category'];
	$password=$_POST['Password'];
	$sql="insert into ims.user (IDnum,Name,Category,Password) values ('$IDnum','$name','$category','$password')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>

</body>
<!-- //Body -->
</html>
