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
	$statement="select * from product";	
}
else
{
	$statement="select * from product where product_group='$product_group'";	
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
<script type="text/javascript">


function choose_category()
{
	var category=document.getElementById('choose').value;
	if(category=="mobile_detail")
	{
	
		var product_detail0=document.getElementsByClassName('product_detail')[0];
		product_detail0.style.display='block';	

		var product_detail1=document.getElementsByClassName('product_detail')[1];
		product_detail1.style.display='none';
	}
	if(category=="laptop_detail")
	{
		var product_detail1=document.getElementsByClassName('product_detail')[1];
		product_detail1.style.display='block';	

		var product_detail0=document.getElementsByClassName('product_detail')[0];
		product_detail0.style.display='none';	

	}
	if(category=="accessories")
	{
		var product_detail2=document.getElementsByClassName('product_detail')[2];
		product_detail2.style.display='block';		
		var product_detail0=document.getElementsByClassName('product_detail')[0];
		product_detail0.style.display='none';
		var product_detail1=document.getElementsByClassName('product_detail')[1];
		product_detail1.style.display='none';
	}
	

}

</script>
</head>
<body>
<div class="container">
	<div class="sidebar">
	<ul>
		<li class="heading">Dashboard</li><hr/>
		<li><a href="#" class="active">Product</a></li>
		<li><a href="customer.php">Customer</a></li>
		<li><a href="supplier.php">Supplier</a></li>	
		<li><a href="trending.php">Trending</a></li>			
	</ul>		
	</div>
	<!--/.sidebar-->
	<div class="content">
	<div class="content_navigation">
		<div class="division_three">
			<a href="index.php"><label class="button">Add product </label>	</a>
		</div>
		<div class="division_three">
			<label class="button" style="background: green">View Product </label>
		</div>
		<div class="division_three" style="margin-top: 25px">
				<div class="left">Show</div>
				<div class="right">
				<form action="product_info.php" method="post">
					<select name="product_group" onchange="this.form.submit()" >
					<?php if($product_group=="all")
					{
						echo "<option value='all' selected>All</option>
						<option value='mobile'>Mobile</option>
						<option value='laptop'>Laptop</option>
						<option value='accessories'>Accessories</option>";

						}
						else if($product_group=="mobile")
						{
							echo "<option value='all'>All</option>
						<option value='mobile' selected>Mobile</option>
						<option value='laptop'>Laptop</option>
						<option value='accessories'>Accessories</option>";

						}
						else if($product_group=="laptop")
						{
							echo "<option value='all'>All</option>
						<option value='mobile' >Mobile</option>
						<option value='laptop' selected>Laptop</option>
						<option value='accessories'>Accessories</option>";							
						}
						else if($product_group=="accessories")
						{
							echo "<option value='all'>All</option>
						<option value='mobile' >Mobile</option>
						<option value='laptop' >Laptop</option>
						<option value='accessories' selected>Accessories</option>";								
						}
						?>

						
					</select>
					</form>
				</div>
			</div><!--/.division_three-->
	</div><!--/.content_navigation-->
	<div class="clear_fix"></div>
		<table border="1" style="border-collapse: collapse;">
			<tr>
				<th width="200" height="50">Name of product</th>
				<th width="200">Product Category</th>
				<th width="200">Product Model</th>
				<th width="200">Status</th>
				<th width="300">Action</th>
			</tr>
<?php while($row=mysqli_fetch_assoc($query))
{
?>
			<tr >
				<td height="40"><?=$row['name_of_product'];?></td>
				<td><?=$row['product_group'];?></td>
				<td><?=$row['product_model'];?></td>
				<td>
					<form action="product_status.php?product_model='<?=$row['product_model'];?>'" method="post">	
					
					<?php 
							$model=$row['product_model'];
							$group=$row['product_group'];
							if($group=='mobile')
							{
								$product_group='mobile_detail';
								echo "<input type='hidden' name='group' value='mobile'>";
							}
							else if($group=='laptop')
							{
								$product_group='laptop_detail';
								echo "<input type='hidden' name='group' value='laptop'>";
							}
							else if($group=="accessories")
							{
								$product_group='accessories_detail';
								echo "<input type='hidden' name='group' value='accessories'>";
							}
							$query1="select popular from $product_group where model='$model'";
							// print_r($query1);
							$rows=mysqli_fetch_array(mysqli_query($con,$query1));
							if($rows[0]=='disabled'){


							?>				
						<select name="status" onchange="this.form.submit()">	
							<option value="disabled" selected="selected">Disabled</option>
							<option value="active">Active</option>
							<?php
						}
						else
						{
							?>
							<select name="status" onchange="this.form.submit()">	
							<option value="disabled" >Disabled</option>
							<option value="active" selected="selected">Active</option>
						<?php }	?>

							
						</select>
						
					</form>					
				</td>
				<td><a href="<?=$row['product_group']?>_edit.php?product_model='<?=$row['product_model']?>'" title="edit"><i class="fa fa-edit" ></i></a> <a href="<?=$row['product_group']?>_delete.php?product_model='<?=$row['product_model']?>'" title="delete"><i class="fa fa-trash-o" ></i></a></th>
			</tr>
<?php } ?>
			
		</table>
	


	</div><!--/.content-->
</div><!--/.container-->

</body>
</html>
		
