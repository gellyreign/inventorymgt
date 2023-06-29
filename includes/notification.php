<li class="nav-item dropdown" style="margin-right: -40px">
<?php 
    include 'includes/dbcon.php';
    $query = mysqli_query($con,"SELECT * FROM items WHERE exp_date < CURDATE() OR exp_date <= DATE_ADD(CURDATE(), INTERVAL 30 DAY)");
    $count = mysqli_num_rows($query);

    $sql = mysqli_query($con,"SELECT * FROM items WHERE quantity<=30 OR quantity=0");
    $sum = mysqli_num_rows($sql);

    $total = $sum+$count;

?>
           
        <a class="nav-link dropdown" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-bell fa-lg"></i>
            <span class="position-abolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $total ?>    
            </span>
        </a>
        
        <ul class="dropdown-menu dropdown-menu-end justify-content-end" aria-labelledby="navbarDropdown">
            <li><h5>&nbsp;&nbsp;&nbsp;Notification</h5></li></li>
            <li><hr class="dropdown-divider" /></li>
            






<?php 
       //$query = "SELECT * FROM items LIMIT 5";
        $dte = date("Y-m-d");
        //date_default_timezone_set('Asia/Manila');
        //$time = date('h:i A');

        //query = "SELECT * FROM notif WHERE message <> ' '";
        $query = "SELECT * FROM items WHERE exp_date < CURDATE() OR exp_date <= DATE_ADD(CURDATE(), INTERVAL 30 DAY)";


        $result = mysqli_query($con,$query);
				$valida = "select * from notify where name = '$productName' AND message = '$message'";
		$resu = mysqli_query($con, $valida);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
					
                $productName = $row['name'];
				$sno = $row['sno'];
                $expiryDate = $row['exp_date'];
                $stockQuantity = $row['quantity'];

                if ($expiryDate <= date('Y-m-d')) {
                    $daysUntilExpiry = (strtotime($expiryDate) - strtotime(date('Y-m-d'))) / (60 * 60 * 24);
                    echo "<li><a class='dropdown-item' href=''><strong>Product $productName has expired.</strong><br><label style='color:gray; font-size:14px;'>Date: $dte</label></a></li>
                    <li><hr class='dropdown-divider'/></li>";
					 $message = "has expired";
					 if(mysqli_num_rows($resu) > 0){
			

					}	
					else{
						$qury="insert into notify(quantity,sno,name,exp_date,message) values('$stockQuantity','$sno',' $productName',' $expiryDate','$message')";
						$resu = mysqli_query($con,$qury);
	
							}
                   
                }else {
                    $daysUntilExpiry = (strtotime($expiryDate) - strtotime(date('Y-m-d'))) / (60 * 60 * 24);
                    echo "<li><a class='dropdown-item' href=''><strong>Product $productName will expire in $daysUntilExpiry days<br><label style='color:gray; font-size:14px;'>Date: $dte</label></strong></a></li>
                    <li><hr class='dropdown-divider'/></li>";
					$message = "expiring soon";
					if(mysqli_num_rows($resu) > 0){
			

		}	
	else{
		$qury="insert into notify(quantity,sno,name,exp_date,message) values('$stockQuantity','$sno',' $productName',' $expiryDate','$message')";
$resu = mysqli_query($con,$qury);
	
	}
                }

               
                //echo '<li><a class="dropdown-item" href="manage_notification.php?id='.$row['sno'].'"><strong>'.$row['message'].'</strong><br><label style="color:gray; font-size:14px;">Date: '.$dte.'</label></a></li>';
                //echo '<li><hr class="dropdown-divider" /></li>';
            }
        }else{
            echo'<p align="center">No Notification<p>';
        }
				
?>



<?php 
       //$query = "SELECT * FROM items LIMIT 5";
        $dte = date("Y-m-d");
        //date_default_timezone_set('Asia/Manila');
        //$time = date('h:i A');

        //query = "SELECT * FROM notif WHERE message <> ' '";
        $query = "SELECT * FROM items WHERE quantity<=30";


        $result = mysqli_query($con,$query);
		$valida = "select * from notify where name = '$productName' AND message = '$message'";
		$resu = mysqli_query($con, $valida);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {

                
                $stockQuantity = $row['quantity'];
                $productName = $row['name'];
                if ($stockQuantity <= 0) {
                    
                    echo "<li><a class='dropdown-item' href=''><strong>Product $productName is out of stock.</strong><br><label style='color:gray; font-size:14px;'>Date: $dte</label></a></li>
                    <li><hr class='dropdown-divider'/></li>";
                   $message = "out of stock";
				   if(mysqli_num_rows($resu) > 0){
			

		}	
	else{
		$qury="insert into notify(quantity,sno,name,exp_date,message) values('$stockQuantity','$sno',' $productName',' $expiryDate','$message')";
$resu = mysqli_query($con,$qury);
	
	}
                }else{
                    echo "<li><a class='dropdown-item' href=''><strong>Product $productName is almost out of stock.</strong><br><label style='color:gray; font-size:14px;'>Date: $dte</label></a></li>
                    <li><hr class='dropdown-divider'/></li>";   
					$message = "almost out of stock";
					if(mysqli_num_rows($resu) > 0){
			

		}	
	else{
		$qury="insert into notify(quantity,sno,name,exp_date,message) values('$stockQuantity','$sno',' $productName',' $expiryDate','$message')";
$resu = mysqli_query($con,$qury);
	
	}
                }

               
                //echo '<li><a class="dropdown-item" href="manage_notification.php?id='.$row['sno'].'"><strong>'.$row['message'].'</strong><br><label style="color:gray; font-size:14px;">Date: '.$dte.'</label></a></li>';
                //echo '<li><hr class="dropdown-divider" /></li>';
            }
        }else{
            echo'<p align="center">No Notification<p>';
        }

	


?>

            <li>
                <a class="dropdown-item" style="color: blue; text-align: center;" href="manage_notification.php">View all notification</a>
            </li>
        </ul>
            
</li>
        </ul>

