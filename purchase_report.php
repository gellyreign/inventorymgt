<link rel="shortcut icon" type="x-icon" href="css/alfonso.png">
<?php
include ('session.php');
include ('includes/header.php');
include ('includes/dbcon.php');
$bul[10000007] = false;
?>


<div class="container-fluid px-4">
  <h4 class="mt-4"><i class="fa-solid fa-print"></i> Sales Report</h4>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Report List</li>
  </ol>
  <script type="text/javascript">
    
  </script>
  <form class="form-inline" method="POST" action="">
        <div class="row">
          <div class="col-3 mt-3">
            <strong><label  class="control-label" for="mnth">Month:</label></strong>
  
            <select name="mnth" id="mnth" class="form-select" onChange="filter_stock_query(this.value);">
              <option value="">Select Month</option>
              <option>January</option>
              <option>February</option>
              <option>March</option>
              <option>April</option>
              <option>May</option>
              <option>June</option>
              <option>July</option>
              <option>August</option>
              <option>September</option>
              <option>October</option>
              <option>November</option>
              <option>December</option>
            </select>
          </div>
          <div class="col-3 mt-3" style="margin-left: -15px;">
            <strong><label  class="control-label" for="yr">Year:</label></strong>
        
            <select name="yr" id="yr" class="form-select">
              <option value="">Select Year</option>

              <?php
              $sql = "SELECT * FROM rp_view";
              $res = mysqli_query($con, $sql);
              while ($row = mysqli_fetch_assoc($res)) 
              {
                if ($bul[$row['yr']] != true && $row['yr'] != 'yr') 
                {
                  ?>
                  <option value="<?php
                  echo $row['yr'];?>">
                  <?php echo $row['yr']; ?>
                </option>
                <?php
                $bul[$row['yr']] = true;
              }
            }
            ?>
          </select>
        </div>

        <div class="col-1 mt-5">
          <button class="btn btn-warning" name="search" style="margin-left: -15px;"><i class="fa-solid fa-arrow-up-wide-short"></i></button>
        </div>
      </div>

      <div class="row">
        <div class="col-3 mt-3">
          <strong><label  class="control-label" for="date1">From:</label></strong>
     
          <input type="date" class="form-control"  placeholder="Start"  name="date1" value="<?php echo ($_POST['date1']) ? $_POST['date1'] : '' ?>"/>
        </div>

        <div class="col-3 mt-3" style="margin-left: -15px;">
          <strong><label  class="control-label" for="date2">To:</label></strong>
          <input type="date" class="form-control" placeholder="End"  name="date2" value="<?php echo ($_POST['date2']) ? $_POST['date2'] : '' ?>"/>
        </div>
        <div class="col-1 mt-5">
          <a href="purchase_report.php" type="button" class="btn btn-light " style="margin-left: -15px;"><i class="fa-solid fa-rotate-right"></i></a> 
        </div>
      </div>
    </form>
    
  <div class="card mb-4 mt-2">

    <div class="card-header bg-primary text-white">
  </div>
  <div class="card-body">
    
    <table id="datatablesSimple">
      <thead>
        <tr>
          <th>Product #</th>
          <th>Name</th>
          <th>Unit</th>
          <th>Stock</th>
          <th>Sold</th>
          <th>Cost Price</th>
          <th>Selling Price</th>
          <th>Profit</th>
          <th>Income</th>
          <th>Date</th>
        </tr>

      </thead>
      <tbody>
       <?php include 'report_query.php';?>                
     </tbody>
   </table>
   <form method="post" action="pdf_report.php"  target="_blank">
  <div class="row">
    <div class="col-8"></div>
    <div class="col-4" id="compute">
     
     <div class="input-group mb-2" >
        <!--<span class="input-group-text" >Total Profit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x20B1;</span>
        <label class="form-control" for="vat"> Total Profit</label>-->
        <input type="hidden" id="vat" class="form-control" readonly onkeyup="subt();" name="c" value="<?php echo $sum?>.00" placeholder="0.00">
      </div> 

      <div class="input-group mb-2" >
        
        <!--<label class="form-control" for="vat"> Total Revenue</label>-->
        <input type="hidden" id="val" class="form-control" readonly onclick="calc1();" name="d" value="<?php echo $tc?>.00" placeholder="0.00">
      </div>

      <div class="input-group mb-2" >
        <!--<label class="form-control" for="vat"> Total Capital</label>-->
        <input type="hidden" id="overall" class="form-control" readonly name="e" onkeyup="subt();" value=" <?php echo $total?>.00" placeholder="0.00">
      </div> 
    </div>  
  </div>
   <button class="btn btn-primary" name="export" id="export"><i class="fa-solid fa-file-export"></i> Export PDF
   </button> 
   <input type="hidden" class="form-control" name="date1" value="<?php if(isset($_POST['search']))echo ($_POST['date1']) ? $_POST['date1'] : '' ?>"/>
   <input type="hidden" class="form-control" name="date2" value="<?php if(isset($_POST['search']))echo ($_POST['date2']) ? $_POST['date2'] : '' ?>"/>

   <input type="hidden" class="form-control" name="mnth" value="<?php if(isset($_POST['search']))echo ($_POST['mnth']) ? $_POST['mnth'] : '' ?>"/>
   <input type="hidden" class="form-control" name="yr" value="<?php if(isset($_POST['search']))echo ($_POST['yr']) ? $_POST['yr'] : '' ?>"/>
   
   
 </div>
</div>
</form>

</div>
<?php
include ('includes/footer.php');
include ('includes/scripts.php');
?>