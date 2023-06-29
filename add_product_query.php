<?php 

//session_start(); 
include 'includes/dbcon.php';

if(isset($_POST['submit']))
{	
	$pname = $_POST['pname'];
	$quan = $_POST['quan'];
	$rp = $_POST['rp'];
	$cp = $_POST['cp'];


	$description = trim($_POST['description']);
	
	$cat = $_POST['cat'];
	$sup = $_POST['sup'];
	$image = $_FILES['item_image']['name'];
	$exp = $_POST['exp'];
	$dte = date("Y-m-d");

	$query="insert into items(name,stock,quantity,cost_price,selling_price,description,prescribe,supplier,image,date,exp_date) values('$pname','$quan','$quan','$cp','$rp','$description','$cat','$sup','$image','$dte','$exp')";
	$result = mysqli_query($con,$query);
	
	if($result)
	{
		move_uploaded_file($_FILES["item_image"]["tmp_name"], "item_img/".$_FILES["item_image"]["name"]);
		echo 
			'<script>
				window.location.href = "add_product.php";
				alert("Product successfully registered!");
      		</script>';
	}else{
		echo 
			'<script>
				window.location.href = "add_product.php";
				alert("Product failed to register!");
      		</script>';
	}
}


?>