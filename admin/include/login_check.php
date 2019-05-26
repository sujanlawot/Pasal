<?php 


if(isset($_SESSION['login']))
{
	if($_SESSION['login']=="active")
	{

	}
	else
	{
		$_SESSION['errmsg']="Unable to login. Please contact admin.";
		header('location:../index.php');		
	}
}
if(!isset($_SESSION['login']))
{
	$_SESSION['errmsg']="Please login before you enter to dashboard";
	header('location:login.php');	
}
?>
