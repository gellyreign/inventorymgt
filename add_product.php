
<?php
  include ('session.php');
	include ('includes/header.php');
  include 'includes/dbcon.php';
?>  
 <div class="container-fluid px-4">
    <h4 class="mt-4"><i class="fa-solid fa-pills"></i> Add Product</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="manage_user.php">Back</a></li>
        <li class="breadcrumb-item active">Add Product</li>
    </ol>
   
     
    <div class="card mb-4 mt-2">

        <div class="card-header  bg-primary text-white">
           
        </div>
        <div class="card-body">
         
             <form action="add_product_query.php" method="post" id="form" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="">Name</label>
                  <input type="text" class="form-control" id="pname" name="pname" required placeholder="Enter Product Name" autofocus>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Quantity</label>
                  <input type="number" class="form-control" id="quan" name="quan" required placeholder="Enter Quantity">
                </div>

                
                
                <div class="col-md-6 mb-3">
                  <label for="">Description</label>
                  <textarea type="text" class="form-control" id="description" name="description" required placeholder="Enter Description"></textarea> 
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Cost Price</label>
                  <input type="text" class="form-control" id="cp" name="cp" required placeholder="Enter Cost Price">
                </div>
                
                <div class="col-md-6 mb-3">
                  <label for="">Retail Price</label>
                  <input type="text" class="form-control" id="rp" name="rp" required placeholder="Enter Retail Price">
                </div>



                <div class="col-md-6 mb-3">
                  <label for="">Prescribed</label>
                <select class="form-select" name="cat" aria-label="Default select example" required>
                  <option selected>Select</option>
                  <option>Adult</option>
                  <option>Child</option>
                  <option>Infant</option>
                </select >
                        
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Manufacturer</label>
                  <input type="text" class="form-control" id="sup" name="sup" required placeholder="Enter Manufacturer">
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Image</label>
                   <input type="file" class="form-control" name="item_image" placeholder="Select Image" required autocomplete="off">
                </div>
                
                 <div class="col-md-6 mb-3">
                  <label for="">Expiration Date</label>
                  <input type="Date" class="form-control" id="exp" name="exp" required placeholder="Enter Supplier">
                </div>

               
                <div class="col-md-6 mb-2">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i> Save
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