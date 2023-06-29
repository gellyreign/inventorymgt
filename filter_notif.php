<?php
session_start();
   //session_start();
$num = $_SESSION['id'];
require 'includes/dbcon.php';
if(isset($_POST['search']))
{
	$type = $_POST['cat'];
	$query = mysqli_query($con,"SELECT * FROM notify WHERE name='$type' ORDER BY sno DESC");
	$row=mysqli_num_rows($query);
	if($row>0)
	{
		while($fetch=mysqli_fetch_array($query))
		{ 


			?>
			<tr>
			
				<td><?php echo $fetch['name']; ?></td>
				<td><?php echo $fetch['quantity']; ?></td>
				<td><?php echo $fetch['message']; ?></td>
				
			</tr>
			<?php
		}
	}
	
	}
	else
	{

		$query=mysqli_query($con, "SELECT * FROM notify WHERE message <> ' ' ORDER BY sno DESC");
		while($fetch=mysqli_fetch_array($query))
		{
			?>
			<tr>
				
				
				<td><?php echo $fetch['name']; ?></td>
				<td><?php echo $fetch['quantity']; ?></td>
			
				<td><?php echo $fetch['message']; ?></td>
				
				
			</tr>
	
			
			<?php
		}
	}
?>



