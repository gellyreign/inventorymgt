<?php 
session_start();
include 'includes/dbcon.php';

if(isset($_POST['submit'])){
	$id=$_POST['sno'];
	$pname = $_POST['pname'];
	$quan = $_POST['quan'];
	$cp = $_POST['cp'];

	$rp = $_POST['rp'];
	$description = $_POST['description'];
	$cat = $_POST['cat'];
	$sup = $_POST['sup'];

	$exp = $_POST['exp'];

	$new_image = $_FILES['item_image']['name'];
	$old_image = $_POST['item_old_image'];


	if($new_image != ' ')
	{
		$update_filename = $_FILES['item_image']['name'];

	}
	else
	{
		$update_filename = $old_image;

	}

	if(file_exists("item_img/".$_FILES['item_image']['name']))
	{
		$filename= $_FILES['item_image']['name'];
		$query = "UPDATE items SET name='$pname',stock=stock+'$quan', quantity=quantity+'$quan',selling_price='$rp',cost_price='$cp',description='$description',prescribe='$cat',supplier='$sup',exp_date='$exp' WHERE sno='$id'";
		$result = mysqli_query($con,$query);

		if($result)
		{
			//$_SESSION['status'] = [' Successfully Updated','alert-success'];
			header("location: manage_product.php");	
		}
		else
		{
			//$_SESSION['status'] = [' Failed to update','alert-danger'];
			header("location: manage_product.php");	
		}
		
	}
	else
	{
		$query = "UPDATE items SET name='$pname',stock=stock+'$quan', quantity=quantity+'$quan',selling_price='$rp',cost_price='$cp',description='$description',prescribe='$cat',supplier='$sup',exp_date='$exp' WHERE sno='$id'";
		$result = mysqli_query($con,$query);

		if($result){
			//move_uploaded_file($_FILES["item_image"]["tmp_name"], "item_img/".$_FILES["item_image"]["name"]);
			if ($_FILES['item_image']['name'] !='') {
				move_uploaded_file($_FILES["item_image"]["tmp_name"], "item_img/".$_FILES["item_image"]["name"]);
				unlink("item_img/".$old_image);
			}

		//$_SESSION['status'] = [' Successfully Updated','alert-success'];
		header("location: manage_product.php");
		}
	}
}
?> 