<?php
session_start();
$uid=$_SESSION['id'];
require_once 'includes/dbcon.php';


if(!empty($_REQUEST["id"])) {

    $query ="SELECT * FROM account_tbl WHERE user_id != '$uid' AND status = 1 AND del_stat=0 AND type =" . "'" . mysqli_escape_string($con, $_POST["id"] ) ."'";
    
    $result = mysqli_query($con, $query);
    ?>
    <option value="">Select Name</option>

    <?php
    while($row2=mysqli_fetch_assoc($result)){

        if($bul2[$row2['lname']] != true && $row2['lname'] != 'lname' || 1)        { ?>
            <option value="<?php echo $row2['lname']; ?>"><?php echo     $row2['lname']; ?>  </option>
            <?php  
            $bul2[$row2['lname']] = true;
        }
    }
}
?>