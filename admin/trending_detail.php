<?php require_once('include/connection.php');
if(!isset($_GET['id']))
		die();
	$id=$_GET['id'];
$statement="select * from trending where id=$id";
$query=mysqli_query($con,$statement);	
$row=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script type="text/javascript" src="js/chooseany.js">
</script>

</head>
<body>
<div class="container">
	<div class="sidebar">
	<ul>
		<li class="heading">Dashboard</li><hr/>
		<li><a href="index.php" >Product</a></li>
		<li><a href="customer.php" >Customer</a></li>
		<li><a href="supplier.php" >Supplier</a></li>		
		<li><a class="active">Trending</a></li>	
	</ul>		
	</div>
	<!--/.sidebar-->
	<div class="content">
		<div class="product_top">
			<i class="fa fa-laptop"></i> Laptops-Dell
		</div>


	</div><!--/.content-->
</div><!--/.container-->

</body>
</html>
		
