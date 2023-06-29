<?php 
include 'restore_form.php';
include 'gen_tno.php';
?>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav nav-pills nav-fill">
                <div class="sb-sidenav-menu-heading">Home</div>

                <a class="nav-link" href="index.php">

                 <div class="nav-item nav-link active"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Dashboard
                 </div>
             </a>
             
             <div class="sb-sidenav-menu-heading">Manage</div>

            
             <a class="nav-link" href="manage_user.php">


                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-user"></i>&nbsp;&nbsp;Manage User

            </a>

            <a class="nav-link" href="manage_product.php">


                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-pills"></i>&nbsp;&nbsp;Manage Product

            </a>


           
            
            <div class="sb-sidenav-menu-heading">Features</div>

             <a class="nav-link" href="profiling.php">


                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-clipboard-user"></i>&nbsp;&nbsp;Customer Profiling

            </a>

            <a class="nav-link" href="purchase_report.php">

                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-print"></i>&nbsp;&nbsp;Sales Report

            </a>

            <a class="nav-link" href="pos.php?id=<?php echo $number?>">


                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-cash-register"></i>&nbsp;&nbsp;Point of Sale

            </a>
          
        </div>
    </div>
</nav>
</div>