<?php
header('Content-Type: application/json');
$response = array();
if (isset($_GET['sid']))
{
	$sid = $_GET['sid'];
	$con=mysqli_connect("localhost", "root", "", "ims");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$qry = "SELECT * FROM items WHERE sno = '$sid'";
	$result = mysqli_query($con, $qry);  //mysql_query($qry);
	while ($row = mysqli_fetch_array($result)) {
		array_push($response, $row);
    }

	echo json_encode($response);
} 
?>
