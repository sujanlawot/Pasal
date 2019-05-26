<?php include('include/connection.php');
$product_model=$_GET['product_model'];
$group=$_POST['group'];
$status=$_POST['status'];
if($group=='laptop')
{
	$statement="update laptop_detail set popular='$status' where model=$product_model";
	// print_r($statement);
	// die();
	$query=mysqli_query($con,$statement);
	
}
if($group=="mobile")
{
	$statement="update mobile_detail set popular='$status' where model=$product_model";
	$query=mysqli_query($con,$statement);
}
if($group=="accessories")
{
	$statement="update accessories_detail set popular='$status' where model=$product_model";
	$query=mysqli_query($con,$statement);	
}

if($query)
{
	$_SESSION['successmsg']="Successfully updated";
	header('location:product_info.php');
}
if(!$query)
{									

	$_SESSION['errmsg']="Sorry not updated";	
	header('location:product_info.php');
}

?>