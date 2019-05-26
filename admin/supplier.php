<?php require_once('include/connection.php');
$statement="select * from supplier";
$query=mysqli_query($con,$statement);
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
		<li><a href="#" class="active">Supplier</a></li>		
		<li><a href="trending.php">Trending</a></li>	
	</ul>		
	</div>
	<!--/.sidebar-->
	<div class="content">
	<div class="content_navigation">
		<table border="1" style="border-collapse: collapse;">
			<tr>
				<th width="200" height="50">Name of supplier</th>
				<th width="200">Supplier Address</th>
				<th width="200">Email</th>
				<th width="200">Status</th>
				<th width="300">Action</th>
			</tr>
<?php while($row=mysqli_fetch_assoc($query))
			{ ?>
			<tr >
				<td height="40"><?=$row['username'];?></td>
				<td><?=$row['address'];?></td>
				<td><?=$row['email'];?></td>
				<form action="account_type.php" method="post" >
				<input type="hidden" name="email" value="<?=$row['email']?>" >
				<input type="hidden" name="supplier_account_type" >
			
				<td>
					<select name="account_type" onchange="this.form.submit()">
					<?php if($row['status']=="disabled")
					{
						?>
						<option value="disabled" selected>Disabled</option>
						<option value="active">Active</option>
						<?php
					}
					else
					{
						?>
						<option value="disabled" >Disabled</option>
						<option value="active" selected>Active</option>

						<?php
					}
					?>
					
						
						
					</select>
				</td>
				</form>
				
				<td><a href="supplier_detail.php?id=<?=$row['id'];?>" title="view"><i class="fa fa-eye" ></i></a><a href="supplier_mail.php?id=<?=$row['id'];?>" title="Write mail"><i class="fa fa-mail-forward" ></i></a> </td>
			</tr>
<?php } ?>
			
		</table>
	


	</div><!--/.content-->
</div><!--/.container-->

</body>
</html>
		
