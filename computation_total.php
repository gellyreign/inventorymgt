<?php
//profit 
$query=mysqli_query($con, "SELECT SUM(income) as ti FROM rp_view");
$row = mysqli_fetch_assoc($query);
$sum = $row['ti'];

//capital
$query=mysqli_query($con, "SELECT SUM(cp) as tcptl FROM (SELECT DISTINCT sn, capital, income, cp, revenue FROM rp_view GROUP BY ordr) t");
$row = mysqli_fetch_assoc($query);
$total = $row['tcptl'];
//end of capital

//revenue
$query = mysqli_query($con,"SELECT SUM(sp) as tc FROM (SELECT DISTINCT sn, cp,capital, income, sp, yr, revenue FROM rp_view GROUP BY ordr) t");
$row = mysqli_fetch_assoc($query);
$tc = $row['tc'];

//$query=mysqli_query($con, "SELECT SUM(revenue) as tc, SUM(income) as ti FROM rp_view WHERE del_stat=0");


?>
<script>
  function subt(){

   var a = document.getElementById("vat").value;
   var b = document.getElementById("expense").value;
   var total = parseFloat(a)-parseFloat(b);

   document.getElementById("overall").value=total;
 }
</script>