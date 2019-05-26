<?php include('include/connection.php');?>
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
				<label class="button" style="background: green">Add </label>	
			</div>
			<div class="division_three">
				<a href="trending_info.php"><label class="button">View </label>	</a>
			</div>
		</div><!--/.content_navigation-->
		<div class="clear_fix"></div>		

		<div class="product_category">			
			<form action="add_product.php" method="post" enctype="multipart/form-data">		
			<div class="division_two">				
				<div class="left">Name of product</div>
				<div class="right"><input 
				type="text"  name="nop"/></div>
			</div><!--/.division_three-->
			
			<div class="division_two">
				<div class="left">Product group</div>
				<div class="right">
					<select name="product_group">
						<option disabled="disabled" selected="selected">Select your group</option>
						<option value="mobile_detail">Mobile</option>
						<option value="laptop_detail">Laptop</option>
						<option value="accessories">Accessories</option>						
					</select>
				</div>
			</div><!--/.division_three-->
			<div class="clear_fix"></div>
			<div class="division_two">				
				<div class="left">Product model</div>
				<div class="right"><input 
				type="model"  name="model"/></div>
			</div><!--/.division_three-->
						<div class="clear_fix"></div>
			<div class="division_two">
				<div class="left">Captions<br/><br/>
				<textarea name="caption" rows="10" cols="50" placeholder="your caption"></textarea></div>
			</div><!--/.division_three-->
			<div class="clear_fix"></div>
			<div class="division_two">
					<div class="left">Trending Image:</div>
					<div class="right"><input type="file" accept="image/*" name="file" required="required" /></div>
				</div><!--/.division_three-->
				<div class="clear_fix"></div>
				<div class="division_two">
					<div class="left"><input type="submit" name="add_trending_product" value="Add Trending product"></div>
					<div class="right"><input 
					type="reset" name="reset"></div>
			</form>
		</div><!--/.product-category-->
		<div class="clear_fix"></div>		
			
		
	
	</div><!--/.content-->		

</div><!--/.container-->

</body>
</html>