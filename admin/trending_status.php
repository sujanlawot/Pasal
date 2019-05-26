<?php include('include/connection.php');
	if(!isset($_GET['model']) && !isset($_POST['status']))
		die();

	$model=$_GET['model'];
	$status=$_POST['status'];

	$statement="update trending set status='$status' where model=$model";
	// print_r($statement);
	// die();
	$query=mysqli_query($con,$statement);
	if($query)
				{
					$_SESSION['successmsg']="Successfully updated";
					header('location:trending_info.php');
				}
				else
				{								

					$_SESSION['errmsg']="Sorry not updated";	
					header('location:trending_info.php');
				}
?>