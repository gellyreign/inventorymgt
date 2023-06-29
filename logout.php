<?php 
	session_start();
	session_destroy();
	$_SESSION['login_status']='invalid';
	header('location:login.php');
?>