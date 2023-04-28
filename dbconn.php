<?php
session_start();
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbdata = "ims";
// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword,$dbdata);
// Check connection
if (!$conn) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
	
}
?>
