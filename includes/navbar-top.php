
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
           
    <a class="navbar-brand ps-3" href="index.php"><i class="fa-solid fa-prescription"></i> JCBO | Pharmacy</a>
    
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-3 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-4 my-5 my-md-0"></div>
    
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-2">
         <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <?php include 'notification.php'; ?>
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-lg"></i></a>
            
            <ul class="dropdown-menu dropdown-menu-end justify-content-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="user_profile.php?id=<?php echo $_SESSION['id'];?>">User Profile</a></li>
                <li><a class="dropdown-item" class="nav-link" href="update_user.php?id=<?php echo $_SESSION['id'];?>">Change Details</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>   
           
        </li>
    </ul>
</nav>