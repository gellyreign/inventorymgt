<?php 
    include ('session.php');
    include ('includes/header.php');
    include ('includes/dbcon.php');
    

?>

   
 <div class="container-fluid px-4">
    <h4 class="mt-4"><i class="fa-solid fa-clipboard-user"></i> Customer Profile</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Customer Profile List</li>
    </ol>
    
  
    <form class="form-inline" method="POST" action="">
     <div class="row">
      <div class="col-3 mt-3">
        
         <button class="btn btn-warning" name="search"><i class="fa-solid fa-arrow-up-wide-short"></i></button>   
          <a href="profiling.php" type="button" class="btn btn-light" ><i class="fa-solid fa-rotate-right"></i></a> 
      </div>
    <div class="col-3 mt-3" style="margin-left: -220px;">
     

        <select name="mnth" id="mnth" class="form-select">
          <option>Select Month</option>
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
     <div class="col-3 mt-3">
        <select name="yr" id="yr" class="form-select">
          <option>Select Year</option>
          <?php
              $sql = "SELECT *, YEAR(dte) AS yr FROM transfer_tbl";
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
    <div class="col-3 mt-5" >
     
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
                      <th>Order #</th>
                      <th>Last Name</th>
                      <th>First Name</th>
                    
                      <th>Birthday</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Identification #</th>
                      <th>Date Added</th>
                      <th>View</th>
                  </tr>
              </thead>
              <tbody>

                 <?php include 'filter_profile.php';?>
              </tbody>
            </table>
        </div>
    </div>
  </div>

<?php
  include ('includes/footer.php');
  include ('includes/scripts.php');
?>

