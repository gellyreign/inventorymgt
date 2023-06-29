<?php

require 'includes/dbcon.php';
if(isset($_POST['search']))
{	
	$dte = date("Y");
	$mnth = $_POST['mnth'];
	$yr = $_POST['yr'];
	$query = mysqli_query($con,"SELECT * FROM transfer_tbl WHERE MONTHNAME(dte) = '$mnth' AND  YEAR(dte)='$yr' ORDER BY ID DESC");
	$row=mysqli_num_rows($query);
	if($row>0)
	{
		while($fetch=mysqli_fetch_array($query))
		{ 


			?>
			<tr>
				<td><?php echo $fetch['tno']; ?></td>
				<td><?php echo $fetch['tfrom']; ?></td>
				<td><?php echo $fetch['tto']; ?></td>
				<td><?php echo $fetch['tfpos']; ?></td>
				<td><?php echo $fetch['ttopos']; ?></td>
				<td><?php echo $fetch['sector']; ?></td>
				
				<td><?php echo $fetch['office']; ?></td>
				<td>
					
					<?php 
					$now = time();
					$date = $fetch['dte'];
					$diff = $now-strtotime($date);
					$days = round($diff / (60 * 60 * 24));
					echo $date;
					echo '<br><label align="center"><b>Sold '. $days. ' day/s ago</b></label>';
					
					?>
				</td>
					
				</td>
				<td> 
					<button type="button" class="btn">
	      				<a class="nav-link" href="print.php?id=<?php echo $fetch['tno'];?>">
	          				<i class="fa-solid fa-eye" style="color: blue;"></i>
	          			</a>
      				</button>

      				<button class="btn">
	      				<a href="print.php?id=<?php echo $fetch['tno'];?>" class="nav-link"  download="print.php?id=<?php echo $fetch['tno'];?>">
	          				<i class="fa-solid fa-file-arrow-down" style="color: orange;"></i>
	      				</a>
      				</button>					
				</td>
			</tr>
	<?php include 'status_user.php';?>
			<?php
			}
		}
		elseif(isset($_POST['search']))
		{
		
	$query = mysqli_query($con,"SELECT * FROM transfer_tbl WHERE YEAR(dte) = '$yr' ORDER BY ID DESC");
	$row=mysqli_num_rows($query);
	
		while($fetch=mysqli_fetch_array($query))
		{ 


			?>
			<tr>
				<td><?php echo $fetch['tno']; ?></td>
				<td><?php echo $fetch['tfrom']; ?></td>
				<td><?php echo $fetch['tto']; ?></td>
				<td><?php echo $fetch['tfpos']; ?></td>
				<td><?php echo $fetch['ttopos']; ?></td>
				<td><?php echo $fetch['sector']; ?></td>
				
				<td><?php echo $fetch['office']; ?></td>
				<td>
					
					<?php 
					$now = time();
					$date = $fetch['dte'];
					$diff = $now-strtotime($date);
					$days = round($diff / (60 * 60 * 24));
					echo $date;
					echo '<br><label align="center"><b>Sold '. $days. ' day/s ago</b></label>';
					
					?>
				</td>
					
				</td>
				<td> 
					<button type="button" class="btn">
	      				<a class="nav-link" href="print.php?id=<?php echo $fetch['tno'];?>">
	          				<i class="fa-solid fa-eye" style="color: blue;"></i>
	          			</a>
      				</button>

      				<button class="btn">
	      				<a href="print.php?id=<?php echo $fetch['tno'];?>" class="nav-link"  download="print.php?id=<?php echo $fetch['tno'];?>">
	          				<i class="fa-solid fa-file-arrow-down" style="color: orange;"></i>
	      				</a>
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

		$query=mysqli_query($con, "SELECT * FROM transfer_tbl ORDER BY ID DESC");
		while($fetch=mysqli_fetch_array($query))
		{
			?>
			<tr>
				<td><?php echo $fetch['tno']; ?></td>
				<td><?php echo $fetch['tfrom']; ?></td>
				<td><?php echo $fetch['tto']; ?></td>
				<td><?php echo $fetch['tfpos']; ?></td>
				<td><?php echo $fetch['ttopos']; ?></td>
				<td><?php echo $fetch['sector']; ?></td>
				
				<td><?php echo $fetch['office']; ?></td>
				<td>
					
					<?php 
					$now = time();
					$date = $fetch['dte'];
					$diff = $now-strtotime($date);
					$days = round($diff / (60 * 60 * 24));
					echo $date;
					echo '<br><label align="center"><b>Sold '. $days. ' day/s ago</b></label>';
					
					?>
				</td>
					
				</td>
				<td> 
					<button type="button" class="btn">
	      				<a class="nav-link" href="print.php?id=<?php echo $fetch['tno'];?>">
	          				<i class="fa-solid fa-eye" style="color: blue;"></i>
	          			</a>
      				</button>

      				<button class="btn">
	      				<a href="print.php?id=<?php echo $fetch['tno'];?>" class="nav-link"  download="print.php?id=<?php echo $fetch['tno'];?>">
	          				<i class="fa-solid fa-file-arrow-down" style="color: orange;"></i>
	      				</a>
      				</button>					
				</td>
				
			</tr>
	<?php include 'status_user.php';?>
			
			<?php
		}
	}
?>



