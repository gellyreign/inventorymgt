<?php

require 'includes/dbcon.php';
if(isset($_POST['search']))
{	
	$ps =  trim($_POST['ps']);
	$pname = trim($_POST['pname']);
	
	//$ps = $_POST['pres'];
	$query = mysqli_query($con,"SELECT * FROM items WHERE prescribe='$ps' AND name = '$pname' AND quantity<>0 ORDER BY sno DESC");
	$row=mysqli_num_rows($query);
	if($row>0)
	{
		while($fetch=mysqli_fetch_array($query))
		{ 


			?>
			<tr>
				
				<td><?php echo $fetch['name']; ?></td>
				<td><?php echo $fetch['quantity']; ?></td>
				<td><?php echo $fetch['selling_price']; ?></td>
				<td><?php echo $fetch['description']; ?></td>
				<td><?php echo $fetch['prescribe']; ?></td>
				
				<td><?php echo $fetch['exp_date']; ?></td>
				<td><?php echo $fetch['date']; ?></td>
				<td><img src="<?php echo "item_img/".$fetch['image'];?>" width = 50 height=50 class="img-responsive center-block d-block mx-auto"></td>


				<td> 
					<button type="button" class="btn">
      				<a class="nav-link" href="update_user.php?id=<?php echo $fetch['IDnum'];?>">
      					
          				<i class="fa-solid fa-pencil" style="color: orange;"></i>
      				</a>
      			</button>

      			
      				


				
							
				</td>

				
			</tr>

			<?php
		}
	}
	
	}
	else
	{

		$query=mysqli_query($con, "SELECT * FROM items WHERE quantity <> 0 ORDER BY sno DESC");
		while($fetch=mysqli_fetch_array($query))
		{
			?>
			<tr>
				
				<td><?php echo $fetch['name']; ?></td>
				<td><?php echo $fetch['stock']; ?></td>
				<td><?php echo $fetch['quantity']; ?></td>
				<td><?php echo $fetch['cost_price']; ?></td>
				<td><?php echo $fetch['selling_price']; ?></td>
				<td><?php echo $fetch['description']; ?></td>
				<td><?php echo $fetch['prescribe']; ?></td>
				

				<td><?php echo $fetch['exp_date']; ?></td>
				<td><?php echo $fetch['date']; ?></td>
				<td><img src="<?php echo "item_img/".$fetch['image'];?>" width = 50 height=50 class="img-responsive center-block d-block mx-auto"></td>

				<td> 
					
      				<a class="nav-link" href="update_product.php?id=<?php echo $fetch['sno'];?>">
      					<button type="button" class="btn">
          				<i class="fa-solid fa-pencil" style="color: orange;"></i>
      				</a>

      				


				
							
				</td>

				
			</tr>
			
			<?php
		}
	}
?>



