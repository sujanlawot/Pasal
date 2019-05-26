<?php
session_start();
$id=$_GET['cart_id'];

$i=1;
$x=count($_SESSION);
$count=0;
while($x>=$i)
{
	if(isset($_SESSION['cart'.$x]))
	{
		$count++;	

	}
	
	$x--;
}	
print_r($count);
for($i=1;$i<=$count;$i++)
{
	if($i==$id)
	{
		
		for($j=$i;$j<$count;$j++)
		{
			$_SESSION['cart'.$j]=$j;
			$_SESSION['number'][$j-1]=$_SESSION['number'][$j];
			$_SESSION['model'][$j]=$_SESSION['model'][$j+1];
			$_SESSION['group'][$j]=$_SESSION['group'][$j+1];		
		}
		
		unset($_SESSION['cart'.$count]);
		unset($_SESSION['group'][$count]);
		unset($_SESSION['model'][$count]);
		unset($_SESSION['number'][$count-1]);
		break;
	}

		
}

header('location:opencart.php');
die();
?>