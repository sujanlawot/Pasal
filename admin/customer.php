<?php require_once('include/connection.php');
$statement="select * from customer";
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
		<li><a href="#" class="active">Customer</a></li>
		<li><a href="supplier.php">Supplier</a></li>		
		<li><a href="trending.php">Trending</a></li>	
	</ul>		
	</div>
	<!--/.sidebar-->
	<div class="content">
		<table border="1" style="border-collapse: collapse;">
			<tr>
				<th width="200" height="50">Name of customer</th>
				<th width="200">Customer Address</th>
				<th width="200">Email</th>
				<th width="200">Account type</th>
				<th width="300">Action</th>
			</tr>

			<?php while($row=mysqli_fetch_assoc($query))
			{ ?>
			<tr>
				<td height="40"><?=$row['username'];?></td>
				<td><?=$row['address'];?></td>
				<td><?=$row['email'];?></td>

				<form action="account_type.php" method="post" >
				<input type="hidden" name="email" value="<?=$row['email']?>" >
				<input type="hidden" name="customer_account_type" >
			
				<td>
					<select name="account_type" onchange="this.form.submit()">
					<?php if($row['account_type']=="standard")
					{
						?>
						<option value="standard" selected>Standard</option>
						<option value="premium">Premium</option>
						<?php
					}
					else
					{
						?>
						<option value="standard" >Standard</option>
						<option value="premium" selected>Premium</option>

						<?php
					}
					?>
					
						
						
					</select>
				</td>
				</form>
				
				<td><a href="customer_detail.php?id=<?=$row['id'];?>" title="view"><i class="fa fa-eye" ></i></a> <a href="customer_mail.php?id=<?=$row['id'];?>" title="Write message"><i class="fa fa-mail-forward" ></i></a></td>
			</tr>

<?php
			}?>
			
			
		</table>
	


	</div><!--/.content-->
</div><!--/.container-->

</body>
</html>
		
