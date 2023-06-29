
<?php
  include ('session.php');
	include ('includes/header.php');
  include 'includes/dbcon.php';


?>  

<?php 
        $id = $_GET['id'];
        $query = "SELECT * FROM user WHERE IDnum='$id'";
        $result = mysqli_query($con, $query); 
        $row = mysqli_fetch_array($result); 
        ?> 
 <div class="container-fluid px-4">
    <h4 class="mt-4"><i class="fa-solid fa-user"></i> User Profile</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="add_user.php">Back</a></li>
        <li class="breadcrumb-item active"> User Profile</li>
    </ol>
   
     
    <div class="card mb-4 mt-2">

        <div class="card-header  bg-primary text-white">
           
        </div>
        <div class="card-body">
         
             <form action="update_user_query.php" method="post" id="form">
              <div class="row">
                 <input type="hidden" class="form-control" id="idnum" name="idnum" required autofocus value="<?php echo $row['IDnum']; ?>">
                <div class="col-md-6 mb-3">
                  <label for="">First Name</label>
                  <input type="text" class="form-control" id="fname" name="fname" required placeholder="Enter First Name" autofocus value="<?php echo $row['fname']; ?>">
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Last Name</label>
                  <input type="text" class="form-control" id="lname" name="lname" required placeholder="Enter Last Name" value="<?php echo $row['lname']; ?>">
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Middle Name</label>
                  <input type="text" class="form-control" id="mid" name="mid" required placeholder="Enter Middle Name" value="<?php echo $row['mid']; ?>">
                </div>
                
              
                <div class="col-md-6 mb-3">
                  <label for="">Category</label>
                <select class="form-select" name="cat" aria-label="Default select example" required >
                  <?php 
               include 'includes/dbcon.php';
               $cname  = mysqli_query($con, "SELECT DISTINCT Category FROM user");
               ?>
               <?php 
               foreach($cname as $rows):?>
                <option value="<?php echo $rows['Category']; ?>"
                  <?php if($fetch['Category'] == $rows['Category']) 
                  echo 'selected="selected"'; ?>><?php echo $rows['Category']; ?>    
                </option>
                <?php 
              endforeach;?>
                </select >
                        
                </div>

                <div class="col-md-6 mb-3">
                  <label for="">Username</label>
                  <input type="text" class="form-control" id="uname" name="uname" required placeholder="Enter Userame"/ value="<?php echo $row['uname']; ?>">
                </div>
                
               
                <div class="col-md-6 mb-2">
                
                 <a href="manage_user.php" type="button" class="btn btn-secondary"><i class="fa-solid fa-arrows-rotate"></i> Back</a> 
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