<?php 
    include ('session.php');
    include ('includes/header.php');
    include ('includes/dbcon.php');
    

?>

   
 <div class="container-fluid px-4">
    <h4 class="mt-4"><i class="fa-solid fa-pills"></i> Manage Product</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Product List</li>
    </ol>
    
   
    <div class="col-2 mt-2" style="margin: 0px;">
      <a class="nav-link" href="add_product.php">
          <button type="button" class="btn btn-primary">
            <i class="fa-solid fa-pills"></i> Add Product
          </button>
      </a>
    </div>

     <form class="form-inline" method="POST" action="">
     <div class="row">
      <div class="col-3 mt-3">
         <button class="btn btn-warning" type="submit" name="search"><i class="fa-solid fa-arrow-up-wide-short"></i></button>   
         <a href="manage_product.php" type="button" class="btn btn-light" ><i class="fa-solid fa-rotate-right"></i></a> 
        
      </div>
    <div class="col-3 mt-3" style="margin-left: -220px;">
     

        <select name="pname" id="pname" class="form-select">
          <option value="">Select Medicine</option>
        
          <?php
        

          $sql = "SELECT * FROM items";
          $res = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($res)) 
          {
            if ($bul[$row['name']] != true && $row['name'] != 'name') 
            {
              ?>
              <option value="<?php
              echo $row['name'];?>">
              <?php echo $row['name']; ?>
            </option>
            <?php
            $bul[$row['name']] = true;
          }
        }
        ?>
      </select>

      
    </div>
     <div class="col-3 mt-3">
       
        <select name="ps" class="form-select">
          <option>Prescribed</option>
          <option>Adult</option>
          <option>Child</option>
          <option>Infant</option>
          
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
                      <th>Name</th>
                      <th>Total Stock</th>
                      <th>Remaining Stock</th>
                      <th>Cost Price</th>
                      <th>Retail Price</th>
                      <th>Mass(mg/g)</th>
                      <th>Prescribed</th>
                      
                      <th>Expiration Date</th>
                      <th>Date Added</th>
                      <th>Image</th>
                      <th>Actions</th>

                    
                  </tr>
              </thead>
              <tbody>
                 <?php include 'filter_product.php';?>
              </tbody>
            </table>
        </div>
    </div>
  </div>

<?php
  include ('includes/footer.php');
  include ('includes/scripts.php');
?>

