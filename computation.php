<?php
require 'includes/dbcon.php';


  $mnth = $_POST['mnth'];
  $yr = $_POST['yr'];

  $query=mysqli_query($con, "SELECT SUM(income) as ti FROM rp_view WHERE mnth='$mnth' AND yr='$yr' AND del_stat=0");
  $row = mysqli_fetch_assoc($query);
  $sum = $row['ti'];

  $query=mysqli_query($con, "SELECT SUM(cp) as tcptl FROM (SELECT DISTINCT pn, capital, income, cp, yr, mnth, revenue,del_stat FROM rp_view GROUP BY ordr) t WHERE yr='$yr' AND del_stat=0");
  $row = mysqli_fetch_assoc($query);
  $sumcptl = $row['tcptl'];

  $total = $sumcptl;
//end of capital
  
  	$query = mysqli_query($con,"SELECT SUM(sp) as tc FROM (SELECT DISTINCT pn, sp,capital, income,  yr, mnth, revenue,del_stat FROM rp_view GROUP BY ordr) t WHERE mnth='$mnth'AND yr='$yr' AND del_stat=0");
 	$row = mysqli_fetch_assoc($query);
	$tc = $row['tc'];


?>