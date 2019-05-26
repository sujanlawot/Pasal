<?php
require_once('include/connection.php');

if(isset($_POST['product_group']))
{
	$product_group=$_POST['product_group'];	
}
else
{
	$product_group="all";
}

if($product_group=="all")
{
	$statement="select * from trending";	
}
else
{
	$statement="select * from trending where product_category='$product_group'";	
}

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
		<li><a href="supplier.php" >Supplier</a></li>		
		<li><a class="active">Trending</a></li>	
	</ul>		
	</div>
	<!--/.sidebar-->
	<div class="content" style="padding-top: 10px">
	<div class="content_navigation">
			<div class="division_three">
				<a href="trending.php"><label class="button" >Add </label></a>
			</div>
			<div class="division_three">
				<label class="button" style="background: green">View</label>	
			</div>
		</div><!--/.content_navigation-->
				<div class="division_three" style="margin-top: 25px">
				<div class="left" >Show</div>
				<div class="right">
				<form action="trending_info.php" method="post">
					<select name="product_group" onchange="this.form.submit()" >
					<?php if($product_group=="all")
					{
						echo "<option value='all' selected>All</option>
						<option value='mobile_detail'>Mobile</option>
						<option value='laptop_detail'>Laptop</option>
						<option value='accessories_detail'>Accessories</option>";

						}
						else if($product_group=="mobile_detail")
						{
							echo "<option value='all'>All</option>
						<option value='mobile_detail' selected>Mobile</option>
						<option value='laptop_detail'>Laptop</option>
						<option value='accessories_detail'>Accessories</option>";

						}
						else if($product_group=="laptop_detail")
						{
							echo "<option value='all'>All</option>
						<option value='mobile_detail' >Mobile</option>
						<option value='laptop_detail' selected>Laptop</option>
						<option value='accessories_detail'>Accessories</option>";							
						}
						else if($product_group=="accessories_detail")
						{
							echo "<option value='all'>All</option>
						<option value='mobile_detail' >Mobile</option>
						<option value='laptop_detail' >Laptop</option>
						<option value='accessories_detail' selected>Accessories</option>";								
						}
						?>

						
					</select>
					</form>
				</div>
			</div><!--/.division_three-->
		<div class="clear_fix"></div>
	<div class="content_navigation">

		<table border="1" style="border-collapse: collapse;">
			<tr>
				<th width="100" height="50">product_category</th>
				<th width="100">model</th>
				<th width="700">Caption</th>
				<th width="50">img_src</th>
				<th width="200">status</th>
				<th width="400">Action</th>
			</tr>
<?php while($row=mysqli_fetch_assoc($query))
			{ ?>
			<tr >
				<td height="40"><?=$row['product_category'];?></td>
				<td><?=$row['model'];?></td>
				<td><?php echo substr($row['caption'],0,30)."......."; ?></td>


				<td><?=$row['img_src']?></td>
				<td>
					<form action="trending_status.php?model='<?=$row['model'];?>'" method="post">						
						<select name="status" onchange="this.form.submit()">
						<?php if($row['status']=="disabled")
						{
							?>
							<option value="disabled" selected="selected">Disabled</option>
							<option value="active">Active</option>
							<?php
						}
						else
						{
							?>
							<option value="disabled" >Disabled</option>
							<option value="active" selected="selected">Active</option>
						<?php }	?>

							
						</select>
						
					</form>					
				</td>
				<td><a href="trending_detail.php?id=<?=$row['id'];?>" title="view"><i class="fa fa-eye" ></i></a><a href="trending_edit.php?model='<?=$row['model'];?>'" title="edit"><i class="fa fa-edit" ></i></a> <a href="trending_delete.php?id=<?=$row['id'];?>" title="delete"><i class="fa fa-trash-o" ></i></a></td>
			</tr>
<?php  }?>
			
		</table>
	


	</div><!--/.content-->
</div><!--/.container-->

</body>
</html>
		
