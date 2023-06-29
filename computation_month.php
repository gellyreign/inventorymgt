<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
$query=mysqli_query($con, "SELECT SUM(capital) as tc, SUM(income) as ti FROM rp_view WHERE mnth='$mnth' AND del_stat=0");
while($fetch=mysqli_fetch_array($query))
{
  ?>
  
  <div class="row">
    <div class="col-8"></div>
    <div class="col-4" id="compute">
      <div class="input-group mb-2" >
        <span class="input-group-text" >Total Revenue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x20B1;</span>
        <input type="text" id="val" class="form-control" readonly onclick="calc1();" name="c" value="<?php echo $fetch['tc']?>.00" placeholder="0.00">
      </div>
      <div class="input-group mb-2" >
        <span class="input-group-text" >Total Income&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x20B1;</span>
        <input type="text" id="vat" class="form-control" readonly onkeyup="subt();" value=" <?php echo $fetch['ti']?>.00" placeholder="0.00">
      </div> 
      <div class="input-group mb-2" >
        <span class="input-group-text" >Less Expenses&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x20B1;</span>
        <input type="text" id="expense" class="form-control" name="d" onkeyup="subt();" value="" placeholder="0.00">
      </div> 
      <div class="input-group mb-2" >
        <span class="input-group-text" >Total Profit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x20B1;</span>
        <input type="text" id="overall" class="form-control" readonly name="e" onkeyup="subt();" value="<?php echo $fetch['ti']?>.00" placeholder="0.00">
      </div> 
    </div>  
  </div>
  <?php
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

