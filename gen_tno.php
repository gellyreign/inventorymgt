<?php 
  error_reporting(0);
  $query = "SELECT ID FROM transfer_tbl ORDER BY ID DESC";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);
  $lastid = $row['ID'];

  if(empty($lastid)){

     $number = 'P-00001';

  }
  else{

      $idd = str_replace("P-", "", $lastid);
      $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
      $number = 'P-'.$id;
  }
?>