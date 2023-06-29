<?php 
error_reporting(0);
include 'includes/dbcon.php';
$query = "SELECT ID FROM purchase_tbl ORDER BY ID DESC";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$tno = $row['ID'];

if(empty($tno))
{
 $newtno = "OR00001";
}
else
{
 $rep = str_replace("OR", "", $tno);
 $gen = str_pad($rep + 1, 5, 0, STR_PAD_LEFT);
 $newtno = 'OR'.$gen;
}



?>