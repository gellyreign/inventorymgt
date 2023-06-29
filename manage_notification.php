<?php 
    include ('session.php');
    include ('includes/header.php');
    include ('includes/dbcon.php');
       //session_start();
    $num = $_SESSION['id'];

?>


 <div class="container-fluid px-4">
    <h4 class="mt-4"> Manage Notification</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Notification List</li>
    </ol>
    
   
    <div class="col-2 mt-2" style="margin: 0px;">
      <a class="nav-link" href="index.php">
          <button type="button" class="btn btn-primary">
            <i class="fa-solid fa-arrow-left"></i> Back
          </button>
      </a>
    </div>

    <form class="form-inline" method="POST" action="">
     <div class="row">
    
     <div class="col-3 mt-3">
       
          
   
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
                  
                      <th>Product Name</th>
                      <th>Stocks</th>
					 
                      <th>Message</th>
                  </tr>
              </thead>
              <tbody>

                 <?php include 'filter_notif.php';?>
              </tbody>
            </table>
        </div>
    </div>
  </div>

<?php
  include ('includes/footer.php');
  include ('includes/scripts.php');
?>

