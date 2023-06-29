<?php
require 'includes/dbcon.php';
if(isset($_POST['search'])){
  
  $date1 = date("Y-m-d", strtotime($_POST['date1']));
  $date2 = date("Y-m-d", strtotime($_POST['date2']));
  
  //$query=mysqli_query($con, "SELECT SUM(income) as ti FROM rp_view WHERE date(dte) BETWEEN '$date1' AND '$date2' AND del_stat=0");
  //$row = mysqli_fetch_assoc($query);
  //$sum = $row['ti'];

  //total income
  $query=mysqli_query($con, "SELECT SUM(income) as ti FROM rp_view WHERE date(dte) BETWEEN '$date1' AND '$date2'");
  $row = mysqli_fetch_assoc($query);
  $sum = $row['ti'];

  //total revenue 
  //capital
  $query=mysqli_query($con, "SELECT SUM(cp) as tcptl FROM (SELECT DISTINCT sn, capital, income, cp, revenue, dte FROM rp_view GROUP BY ordr) t  WHERE date(dte) BETWEEN '$date1' AND '$date2'");
  $row = mysqli_fetch_assoc($query);
  $sumcptl = $row['tcptl'];

  $total = $sumcptl;
//end of capital

  $query = mysqli_query($con,"SELECT SUM(sp) as tc FROM (SELECT DISTINCT sn, sp,capital, income, revenue,dte FROM rp_view GROUP BY ordr) t  WHERE date(dte) BETWEEN '$date1' AND '$date2'");
  $row = mysqli_fetch_assoc($query);
  $tc = $row['tc'];
  if($row>0)
  {
   while($fetch=mysqli_fetch_array($query)){
    ?>
    <div class="row">
      <div class="col-8"></div>
      <div class="col-4" id="compute">
       
      <div class="input-group mb-2" >
        <!--<span class="input-group-text" >Total Profit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x20B1;</span>-->
        <!--<label class="form-control" for="vat"> Total Profit</label>-->
        <input type="hidden" id="vat" class="form-control" readonly onkeyup="subt();" name="c" value="<?php echo $sum?>.00" placeholder="0.00">
      </div> 

      <div class="input-group mb-2" >
        
        <!--<label class="form-control" for="vat"> Total Revenue</label>-->
        <input type="hidden" id="val" class="form-control" readonly onclick="calc1();" name="d" value="<?php echo $fetch['tc']?>.00" placeholder="0.00">
      </div>

      <div class="input-group mb-2" >
        <!--<label class="form-control" for="vat"> Total Capital</label>-->
        <input type="hidden" id="overall" class="form-control" readonly name="e" onkeyup="subt();" value=" <?php echo $total?>.00" placeholder="0.00">
      </div> 
      </div>  
    </div> 

    <?php
  }
}
}
?>
<script>
  function subt(){

   var a = document.getElementById("vat").value;
   var b = document.getElementById("expense").value;
   var total = parseFloat(a)-parseFloat(b);

   document.getElementById("overall").value=total;
 }
</script>
