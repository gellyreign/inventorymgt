<?php 
	$sname="localhost";
	$uname="root";
	$pwd="";
	$dbname="ims";

	$con=new mysqli($sname, $uname, $pwd, $dbname);

	if(!$con)
		die(mysqli_error($con));
	
?>