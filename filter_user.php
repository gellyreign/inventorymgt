<?php
session_start();
   //session_start();
   //$num = $_SESSION['id'];
require 'includes/dbcon.php';
if(isset($_POST['search']))
{
	$type = $_POST['cat'];
	$query = mysqli_query($con,"SELECT * FROM user WHERE Category = '$type' ORDER BY IDnum DESC");
	$row=mysqli_num_rows($query);
	if($row>0)
	{
		while($fetch=mysqli_fetch_array($query))
		{ 


			?>
			<tr>
				
				<td><?php echo $fetch['fname']; ?></td>
				<td><?php echo $fetch['lname']; ?></td>
				<td><?php echo $fetch['mid']; ?></td>
				<td><?php echo $fetch['Category']; ?></td>
				<td><?php echo $fetch['uname']; ?></td>
				<td><?php  

				$status = $fetch['status'];

				if($status == "Activate"){
						echo "<label style=' color:green; align:center;' ><strong>Active</strong></label>";
					}
					else{
						echo "<label style=' color:red; align:center;' ><strong>Inactive</strong></label>";
					}
				?>
					

				</td>
				<td><?php echo $fetch['date_added']; ?></td>
				

				<td> 
					
      				<a class="nav-link" href="update_user.php?id=<?php echo $fetch['IDnum'];?>">
      					<button type="button" class="btn">
          				<i class="fa-solid fa-pencil" style="color: orange;"></i>
      				</a>


				
					<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deact<?php echo $fetch['IDnum'];?>">
					 <i class="fa-solid fa-gear" style="color: black;"></i>
					</button>				
				</td>
				
			</tr>
	<?php include 'status_user.php';?>
			<?php
		}
	}
	
	}
	else
	{

		$query=mysqli_query($con, "SELECT * FROM user ORDER BY IDnum DESC");
		while($fetch=mysqli_fetch_array($query))
		{
			?>
			<tr>
				
				<td><?php echo $fetch['fname']; ?></td>
				<td><?php echo $fetch['lname']; ?></td>
				<td><?php echo $fetch['mid']; ?></td>
				<td><?php echo $fetch['Category']; ?></td>
				<td><?php echo $fetch['uname']; ?></td>
				<td><?php  

				$status = $fetch['status'];

				if($status == "Activate"){
						echo "<label style=' color:green; align:center;' ><strong>Active</strong></label>";
					}
					else{
						echo "<label style=' color:red; align:center;' ><strong>Inactive</strong></label>";
					}
				?>
					

				</td>
				<td><?php echo $fetch['date_added']; ?></td>
				

				<td> 
					
      				<a class="nav-link" href="update_user.php?id=<?php echo $fetch['IDnum'];?>">
      					<button type="button" class="btn">
          				<i class="fa-solid fa-pencil" style="color: orange;"></i>
      				</a>
				
					<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deact<?php echo $fetch['IDnum'];?>">
					 <i class="fa-solid fa-gear" style="color: black;"></i>
					</button>				
				</td>
				
			</tr>
	<?php include 'status_user.php';?>
			
			<?php
		}
	}
?>



