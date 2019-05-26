<?php
session_start();
if(isset($_POST['number']))
{
	$number=$_POST['number'];

	for($i=0;$i<count($number);$i++)
	{
		$_SESSION['number'][$i]=$number[$i];	
	}	
}


header('location:opencart.php');

?>