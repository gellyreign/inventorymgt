
<?php
  include ('session.php');
	include ('includes/header.php');
  include 'includes/dbcon.php';
?>  
 <div class="container-fluid px-4">
    <h4 class="mt-4"><i class="fa-solid fa-user-plus"></i> Add User</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="add_user.php">Back</a></li>
        <li class="breadcrumb-item active">Add User</li>
    </ol>
   
     
    <div class="card mb-4 mt-2">

        <div class="card-header  bg-primary text-white">
           
        </div>
        <div class="card-body">
         
             <form action="add_user_query.php" method="post" id="form">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="">First Name</label>
                  <input type="text" class="form-control" id="fname" name="fname" required placeholder="Enter First Name" autofocus>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Last Name</label>
                  <input type="text" class="form-control" id="lname" name="lname" required placeholder="Enter Last Name">
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Middle Name</label>
                  <input type="text" class="form-control" id="mid" name="mid" required placeholder="Enter Middle Name">
                </div>
                
              
                <div class="col-md-6 mb-3">
                  <label for="">Category</label>
                <select class="form-select" name="cat" aria-label="Default select example" required>
                  <option selected>Select Category</option>
                  <option>Owner</option>
                  <option>Admin</option>
                  <option>Employee</option>
                  <option>Cashier</option>
                </select >
                        
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Username</label>
                  <input type="text" class="form-control" id="uname" name="uname" required placeholder="Enter Userame"/>
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