<?php 
include('include/connection.php');

if(isset($_POST['supplier_account_type']))
{
	$account_type=$_POST['account_type'];
	$email=$_POST['email'];

	$query="update supplier set status='$account_type' where email='$email'";
	$query_run=mysqli_query($con,$query);
	if($query_run)
	{
		$_SESSION['successmsg']="successfully updated";
		header('location:supplier.php');
	}
	else {
		$_SESSION['successmsg']="successfully updated";
		header('location:supplier.php');	
	}


}

if(isset($_POST['customer_account_type']))
{
	$account_type=$_POST['account_type'];
	$email=$_POST['email'];

	$query="update customer set account_type='$account_type' where email='$email'";
	$query_run=mysqli_query($con,$query);
	if($query_run)
	{
		$_SESSION['successmsg']="successfully updated";
		header('location:customer.php');
	}
	else {
		$_SESSION['successmsg']="successfully updated";
		header('location:customer.php');	
	}


}

?>