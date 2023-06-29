
<?php
  include ('session.php');
  include ('includes/header.php');
  include 'includes/dbcon.php';
?>  
<?php 
        $id = $_GET['id'];
        $query = "SELECT * FROM items WHERE sno='$id'";
        $result = mysqli_query($con, $query); 
        $row = mysqli_fetch_array($result); 
        ?> 
 <div class="container-fluid px-4">
    <h4 class="mt-4"><i class="fa-solid fa-pills"></i> Update Product</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="add_user.php">Back</a></li>
        <li class="breadcrumb-item active">Update Product</li>
    </ol>
   
     
    <div class="card mb-4 mt-2">

        <div class="card-header  bg-primary text-white">
           
        </div>
        <div class="card-body">
         
             <form action="update_product_query.php" method="post" id="form" enctype="multipart/form-data">
              <div class="row">
                 <input type="hidden" class="form-control" id="sno" name="sno" required placeholder="Enter Product Name" value="<?php echo $row['sno'];?>" autofocus>
                <div class="col-md-6 mb-3">
                  <label for="">Name</label>
                  <input type="text" class="form-control" id="pname" name="pname" required placeholder="Enter Product Name" value="<?php echo $row['name'];?>" autofocus>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Quantity</label>
                  <input type="number" class="form-control" id="quan" name="quan" required placeholder="Enter Quantity" value="0">
                </div>

                
                
                <div class="col-md-6 mb-3">
                  <label for="">Description</label>
                  <textarea type="text" class="form-control" id="description" name="description" required placeholder="Enter Description"><?php echo $row['description'];?></textarea> 
                </div>


                
                <div class="col-md-6 mb-3">
                  <label for="">Cost Price</label>
                  <input type="text" class="form-control" id="cp" name="cp" required placeholder="Enter Cost Price" value="<?php echo $row['cost_price'];?>">
                </div>
                
                <div class="col-md-6 mb-3">
                  <label for="">Retail Price</label>
                  <input type="text" class="form-control" id="rp" name="rp" required placeholder="Enter Retail Price" value="<?php echo $row['selling_price'];?>">
                </div>



                <div class="col-md-6 mb-3">
                  <label for="">Prescribed</label>
                <select class="form-select" name="cat" aria-label="Default select example" required>

                    <?php 
               include 'includes/dbcon.php';
               $cname  = mysqli_query($con, "SELECT DISTINCT prescribe FROM items");
               ?>
               <?php 
               foreach($cname as $rows):?>
                <option value="<?php echo $rows['prescribe']; ?>"
                  <?php if($fetch['prescribe'] == $rows['prescribe']) 
                  echo 'selected="selected"'; ?>><?php echo $rows['prescribe']; ?>    
                </option>
                <?php 
              endforeach;?>
                </select >
                </select >
                        
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Manufacturer</label>
                  <input type="text" class="form-control" id="sup" name="sup" required placeholder="Enter Manufacturer" value="<?php echo $row['supplier'];?>" >
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Image</label>
                   <input type="file" class="form-control" name="item_image" placeholder="Select Image" autocomplete="off">
                   <input type="hidden" class="form-control" name="item_old_image" value="<?php echo $fetch['image'] ?>" placeholder="Select Image" autocomplete="off">
                </div>
                
                 <div class="col-md-6 mb-3">
                  <label for="">Expiration Date</label>
                  <input type="Date" class="form-control" id="exp" name="exp" required placeholder="Enter Supplier" value="<?php echo $row['exp_date'];?>">
                </div>

               
                <div class="col-md-6 mb-2">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i> Update
                 </button>
                 <a href="add_user.php" type="button" class="btn btn-secondary"><i class="fa-solid fa-arrows-rotate"></i> Reset</a> 
                </div>
              </div>
          </form>
        </div>
    </div>
  </div>
<?php
  include ('includes/footer.php');
  include ('includes/scripts.php');
  include ('add_account.php');
?>