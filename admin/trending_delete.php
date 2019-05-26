<?php include('include/connection.php');
	if(!isset($_GET['id']))
		die();
	$id=$_GET['id'];
	$statement="delete from trending where id=$id";
	$query=mysqli_query($con,$statement);
	if($query)
				{
					$_SESSION['successmsg']="Successfully deleted";
					header('location:trending_info.php');
				}
				else
				{								

					$_SESSION['errmsg']="Sorry not deleted";	
					header('location:trending_info.php');
				}
?>