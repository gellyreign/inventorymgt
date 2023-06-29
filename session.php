<?php
    session_start();
   
    if($_SESSION['login_status']=='invalid' || empty($_SESSION['login_status'])){
    //$_SESSION['login_status']='invalid';
    unset($_SESSION['EUname']);
    //echo "<script>window.location.href='login.php'</script>";
    header('location:login.php');
    }
    //echo 'session'.$_SESSION['stat'];
?>