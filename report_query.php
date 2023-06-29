<?php
require 'includes/dbcon.php';
if(isset($_POST['search'])){
	$mnth = $_POST['mnth'];
	$yr = $_POST['yr'];
	$date1 = date("Y-m-d", strtotime($_POST['date1']));
	$date2 = date("Y-m-d", strtotime($_POST['date2']));
	
	
	$query = mysqli_query($con,"SELECT * FROM rp_view WHERE date(rp_view.dte) BETWEEN '$date1' AND '$date2' ORDER BY dte DESC");
	
	$row=mysqli_num_rows($query);
	if($row>0)
	{
		while($fetch=mysqli_fetch_array($query)){
			?>
			<tr>
				
				<td><?php echo $fetch['sn']?></td>
				<td><?php echo $fetch['name']?></td>
				<td><?php echo $fetch['brand']?></td>
				<td><?php echo $fetch['stock']?></td>
				<td><?php echo $fetch['sold']?></td>
						
				<td><?php echo $fetch['cp']?></td>
				<td><?php echo $fetch['sp']?></td>
				<td><?php echo $fetch['capital']?></td>
							
				<td><?php echo $fetch['income']?></td>
				<td><?php echo $fetch['dte']?></td>
			</tr>	
			<?php
		}
		include 'computation_date.php';
	}
			
	elseif($mnth && $yr)
			{
					include 'computation_year_month.php';
				
					$query=mysqli_query($con, "SELECT * FROM rp_view where mnth='$mnth' AND yr = '$yr' ORDER BY dte DESC");
					while($fetch=mysqli_fetch_array($query))
					{	
					?>
					<tr>
						<td><?php echo $fetch['sn']?></td>
						<td><?php echo $fetch['name']?></td>
						<td><?php echo $fetch['brand']?></td>
						<td><?php echo $fetch['stock']?></td>
						<td><?php echo $fetch['sold']?></td>
						
						<td><?php echo $fetch['cp']?></td>
						<td><?php echo $fetch['sp']?></td>
						<td><?php echo $fetch['capital']?></td>
							
						<td><?php echo $fetch['income']?></td>
						<td><?php echo $fetch['dte']?></td>
					</tr>

					<?php
				}

			}
			
					elseif($yr)
			{
					$query=mysqli_query($con, "SELECT * FROM rp_view where yr = '$yr' ORDER BY dte DESC");
					while($fetch=mysqli_fetch_array($query))
					{	
						?>
						<tr>
							
							<td><?php echo $fetch['sn']?></td>
							<td><?php echo $fetch['name']?></td>
							<td><?php echo $fetch['brand']?></td>
							<td><?php echo $fetch['stock']?></td>
							<td><?php echo $fetch['sold']?></td>
						
							<td><?php echo $fetch['cp']?></td>
							<td><?php echo $fetch['sp']?></td>
							<td><?php echo $fetch['capital']?></td>
							
							<td><?php echo $fetch['income']?></td>
							<td><?php echo $fetch['dte']?></td>
						</tr>
						<?php
					}
					include 'computation_year.php';
				}
				}

				
				else{
					$query=mysqli_query($con, "SELECT * FROM rp_view ORDER BY dte DESC");
					
					while($fetch=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $fetch['sn']?></td>
							<td><?php echo $fetch['name']?></td>
							<td><?php echo $fetch['brand']?></td>
							<td><?php echo $fetch['stock']?></td>
							<td><?php echo $fetch['sold']?></td>
						
							<td><?php echo $fetch['cp']?></td>
							<td><?php echo $fetch['sp']?></td>
							<td><?php echo $fetch['capital']?></td>
							
							<td><?php echo $fetch['income']?></td>
							<td><?php echo $fetch['dte']?></td>
						</tr>
						<?php


					}
					include 'computation_total.php';

					
				}
				
				?>
