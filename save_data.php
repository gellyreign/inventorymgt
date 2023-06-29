<?php
		

		session_start();
		$con = mysqli_connect("localhost","root","","ims");
		include 'gen_tno.php';

		if(isset($_POST['save_data']))
		{
			//Item Details
			$tno1 = $_POST['tno1'];
			$sn = $_POST['sn'];
			$brand = $_POST['brand'];
			$desc = $_POST['desc'];
			$pics = $_POST['pics'];
			$rquan = $_POST['rquan'];
			$quan = $_POST['quan'];
			$cost = $_POST['cost'];

			$tcost = $_POST['ttlamnt'];

			$tno=$_POST['tno'];
			$tfrom=$_POST['tfrom'];
			$tfpos=$_POST['tfpos'];
			$tto = $_POST['tto'];
			$ttopos = $_POST['ttopos'];
			$sector = $_POST['sector'];
			$office = $_POST['office'];
			$dte = date("Y-m-d");

			//include 'save.php';
			$remaining = $_POST['remaining'];


				foreach ($tno1 as $index => $tno1) 
				{
				# code...
				$s_tno1 =$tno1=$tno; 
				$s_sn = $sn[$index];
				$s_brand =$brand[$index];
				$s_desc =$desc[$index];
				$s_pics =$pics[$index];
				$s_rquan =$rquan[$index];
				$s_cost =$cost[$index];
				$s_tcost =$tcost[$index];
				
				$query="insert into rec_list(tno,sn,brand,description,pics,quantity,cost,tcost,dte) values('$s_tno1','$s_sn','$s_brand','$s_desc','$s_pics','$s_rquan','$s_cost','$s_tcost','$dte')";
				$query_run =mysqli_query($con,$query);
				}
				if($query_run)
				{
				$query="insert into transfer_tbl(tno,tfrom,tfpos,office,tto,ttopos,sector,dte,tcost)values('$tno','$tfrom','$tfpos','$office','$tto','$ttopos','$sector','$dte','$tcost')";
				$result=mysqli_query($con,$query);
			
				
				foreach ($sn as $index => $sn) {
				# code...
				$s_sn = $sn;
				$s_remaining =$remaining[$index];
				$s_rquan =$rquan[$index];
				//$s_rquan =$rquan[$index]
				//$query = "delete from stock_tbl where sno='$s_sn'";
				$query="update items set quantity=quantity - $s_rquan where sno='$s_sn'";
				$query_run =mysqli_query($con,$query);
				
				}
				if($query_run)
				{

					echo "<script>window.open('print.php?id=$number', 'mywindow', 'width=420, height=620, top=0, screenX=1000, screenY=1000');</script>";
					//$_SESSION['transfer_status'] =  [' Item Successfully Transfer','alert-success'];
						//header('location:pos.php');

					
			
					echo "<script>window.location.href='pos.php'</script>";
					//mysqli_error($con);
				}


				}else{
					//$_SESSION['transfer_status'] =  [' Item Not Saved','alert-danger'];
					//header('location:pos.php');
				}
			}
			
		
?>