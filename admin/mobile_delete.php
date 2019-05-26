<?php include('include/connection.php');
	if(!isset($_GET['product_model']))
	die();
	$product_model=$_GET['product_model'];
	$statement="delete from product where product_model=$product_model";
	$statement2="delete from mobile_detail where model=$product_model";
	print_r($statement);
	print_r($statement2);
	
	$query=mysqli_query($con,$statement);
	$query2=mysqli_query($con,$statement2);
	if($query && $query2)
				{
					$_SESSION['successmsg']="Successfully deleted";
					header('location:product_info.php');
				}
				else
				{								

					$_SESSION['errmsg']="Sorry not deleted";	
					header('location:product_info.php');
				}
?>