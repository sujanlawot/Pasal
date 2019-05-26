<?php include('include/connection.php');
	if(!isset($_GET['model']))
		die();
	$model=$_GET['model'];
	$statement="select * from trending where model=$model";
	
	$query=mysqli_query($con,$statement);
	$rows=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/chooseany.js"></script>

	<script type="text/javascript">
		
	</script>
</head>
<body>

<div class="container">
	<div class="sidebar">
		<ul>
			<li class="heading">UserName<!-- <ul><li>change password</li><li>logout</li></ul> --></li><hr/>
			<li><a href="index.php" >Product</a></li>
			<li><a href="customer.php">Customer</a></li>
			<li><a href="supplier.php">Supplier</a></li>	
			<li><a class="active">Trending</a></li>		
		</ul>		
	</div>
	<!--/.sidebar-->
	<div class="content">
	
		<div class="content_navigation">
			<div class="division_three">
				<label class="button">Add </label>	
			</div>
			<div class="division_three">
				<label class="button"><a href="trending_info.php">View </a></label>	
			</div>
		</div><!--/.content_navigation-->
		<div class="clear_fix"></div>		

		<div class="product_category">			
			<form action="update_product.php" method="post" enctype="multipart/form-data">		
			<!-- <input type="hidden" name="id" value="<?=$rows['id'];?>"> -->
			<div class="division_two">				
				<div class="left">Name of product</div>
				<div class="right"><input 
				type="text"  name="nop" value="<?=$rows['image_name'];?>"/></div>
			</div><!--/.division_three-->
			
			<div class="division_two">
				<div class="left">Product group</div>
				<div class="right">
				<?php if($rows['product_category']=="mobile_detail")
				{
					?>
					<select name="product_group" >
						<option disabled="disabled" >Select your group</option>
						<option value="mobile_detail" selected="selected">Mobile</option>
						<option value="laptop_detail">Laptop</option>
						<option value="accessories">Accessories</option>						
					</select>
				<?php } else if($rows['product_category']=="laptop_detail") {
				?>
					<select name="product_group" >
						<option disabled="disabled" >Select your group</option>
						<option value="mobile_detail">Mobile</option>
						<option value="laptop_detail" selected="selected">Laptop</option>
						<option value="accessories">Accessories</option>						
					</select>

					<?php
				} else
				{
					?>
						<select name="product_group" >
						<option disabled="disabled" >Select your group</option>
						<option value="mobile_detail">Mobile</option>
						<option value="laptop_detail">Laptop</option>
						<option value="accessories" selected="selected">Accessories</option>						
					</select>
					<?php
				}

				?>
					
				</div>
			</div><!--/.division_three-->
			<div class="clear_fix"></div>
			<div class="division_two">				
				<div class="left">Product model</div>
				<div class="right"><input 
				type="model"  name="model" value="<?=$rows['model'];?>"/></div>
			</div><!--/.division_three-->
						<div class="clear_fix"></div>
			<div class="division_two">
				<div class="left">Captions<br/><br/>
				<textarea name="caption" rows="20" cols="50"><?=$rows['caption'];?></textarea></div>
			</div><!--/.division_three-->
			<?php if($rows['img_src']!="")
			{
				
				?>
				<div class="division_two">
					<div class="left">Trending Image:<br/><br/>
					<input type="hidden" name="img" value="<?=$rows['img_src'];?>">
				<img src="upload_image/<?=$rows['img_src'];?>" width="400" height="300"/></div>
				</div><!--/.division_three-->
			<div class="division_two"></div>
				<?php
			}
			?>
			
			<div class="division_two">
					<div class="left">Change Trending Image:</div>
					<div class="right"><input type="file" accept="image/*" name="file" value="<?=$rows['img_scr']?>" /></div>
				</div><!--/.division_three-->
			<div class="clear_fix"></div>
			
			
				<div class="clear_fix"></div>
				<div class="division_two">
					<div class="left"><input type="submit" name="update_trending_product" value="Update Trending product"></div>
					<div class="right"><input 
					type="reset" name="reset"></div>
			</form>
		</div><!--/.product-category-->
		<div class="clear_fix"></div>		
			
		
	
	</div><!--/.content-->		

</div><!--/.container-->

</body>
</html>