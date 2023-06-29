<?php include ('includes/scripts.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

<?php   

$sname="localhost";
$uname="root";
$pwd="";
$dbname="ims";

$con=new mysqli($sname, $uname, $pwd, $dbname);

if(!$con)
{
  die(mysqli_error($con));
}
?>


<?php 
$query=mysqli_query($con, "SELECT * FROM items WHERE stock<>0 ORDER BY sno DESC");
while($fetch=mysqli_fetch_array($query))
{
  ?>
  <tr>
    <td style="text-align: center;"><?php echo $fetch['sno']; ?></td>
    <td style="text-align: center;"><?php echo $fetch['name']; ?></td>
    <td style="text-align: center;"><?php echo $fetch['supplier']; ?></td>
    <td style="text-align: center;"><?php echo $fetch['description']; ?></td>
    <td style="text-align: center;"><?php echo $fetch['stock']; ?></td>
    <td style="text-align: center;"><?php echo $fetch['quantity']; ?></td>
    <td style="text-align: center;"><?php echo $fetch['selling_price']; ?></td>
    

    <td style="text-align: center;"> 
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title='copy'>
        <i class="fa-solid fa-arrow-right"></i>
      </button>                           
    </td>
  </tr>
  <?php
}
?>