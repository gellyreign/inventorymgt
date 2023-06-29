<?php 
error_reporting(0);
include 'includes/dbcon.php';
$query1 = "SELECT ID FROM cust_tbl ORDER BY ID DESC";
$result1 = mysqli_query($con,$query1);
$row1 = mysqli_fetch_array($result1);
$tno1 = $row1['ID'];

if(empty($tno1))
{
  $newtno1 = "CU00001";
}
else
{
  $rep1 = str_replace("CU", "", $tno1);
  $gen1 = str_pad($rep1 + 1, 5, 0, STR_PAD_LEFT);
  $newtno1 = 'CU'.$gen1;
}

?>