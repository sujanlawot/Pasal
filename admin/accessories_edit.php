<?php include('include/connection.php');
	if(!isset($_GET['product_model']))
		die();
	$model=$_GET['product_model'];
	$statement="select * from accessories_detail where model=$model";	
	$query=mysqli_query($con,$statement);	
	$rows=mysqli_fetch_assoc($query);
	// // echo $rows['model'];
	// print_r($rows);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/chooseany.js"></script>

	
</head>
<body>

<div class="container">
	<div class="sidebar">
		<ul>
			<li class="heading">UserName<!-- <ul><li>change password</li><li>logout</li></ul> --></li><hr/>
			<li><a class="active">Product</a></li>
			<li><a href="customer.php">Customer</a></li>
			<li><a href="supplier.php">Supplier</a></li>	
			<li><a href="trending.php">Trending</a></li>		
		</ul>		
	</div>
	<!--/.sidebar-->
	<div class="content">
	
		
			<div class="content_navigation">
			<div class="division_three">
				<label class="button" style="width: 300px; background: green">Edit Accessories product</label>	
			</div>
			
		</div><!--/.content_navigation-->
		
		<div class="clear_fix"></div>		

			
<!-- Array ( [model] => vemex [price] => 3000 [fn1] => Package Dimensions [fd1] => 44.2 x 32.4 x 19.5 cm [fn2] => Item Weight [fd2] => 4.9 Kg [fn3] => Additional [fd3] => Bluetooth Home Theater System With FM USB AUX (Golden:Black) [name_of_product] => speaker [image] => b8d9f3fd8fcb0f527557cea2e75e8a1f.jpg [popular] => disabled )  -->

		<div class="product_detail">
		<form action="update_product.php" method="post" enctype="multipart/form-data">

			<div class="division_two">
				<div class="left">Name of product</div>
				<div class="right"><input type="text" name="nameofproduct" value="<?=$rows['name_of_product'];?>"/></div>
			</div><!--/.division_three-->

				
				<div class="division_three">
					<div class="left">
						Model:			
					</div>
					<div class="right">
						<input type="hidden" name="om" value="<?=$rows['model'];?>">
						<input type="text" name="model" value="<?=$rows['model'];?>">
					</div>
				</div>
				<!--/.model-->

			
			<div class="division_three">
				<div class="left">
					Price:			
				</div>
				<div class="right">
					<input type="text" name="price" value="<?=$rows['price'];?>">
				</div>
			</div>
			<!--/.price-->
			<div class="clear_fix"></div>
			
			<h3>Features</h3>
			<div class="division_three">
				<div class="left">

					<input type="text" name="fn[]" placeholder="Feature Name:" value="<?=$rows['fn1'];?>"><br/><br/>
					<textarea placeholder="Detail" rows="10" cols="40" name='fd[]'><?=$rows['fd1'];?></textarea>
				</div>
			</div>
			<!--/.features-->
				<div class="division_three">
				<div class="left">

					<input type="text" name="fn[]" placeholder="Feature Name:" value="<?=$rows['fn2'];?>"><br/><br/>
					<textarea placeholder="Detail" rows="10" cols="40" name="fd[]"><?=$rows['fd2'];?></textarea>
				</div>
			</div>
			<!--/.features-->
				<div class="division_three">
				<div class="left">

					<input type="text" name="fn[]" placeholder="Feature Name:" value="<?=$rows['fn3'];?>"><br/><br/>
					<textarea placeholder="Detail" rows="10" cols="40" name="fd[]"><?=$rows['fd3'];?></textarea>
				</div>
			</div>
			<!--/.features-->

			<div class="clear_fix"></div>
			<?php if($rows['image']=="")				
				{


					?>
				<div class="division_two">
					<div class="left">No Image:<br/><br/>
					<input type="hidden" name="img" value="">
					
				</div><!--/.division_three-->

					<?php
				}
				else
				{
					
					?>
				<div class="division_two">
					<div class="left">Image:<br/><br/>
					<input type="hidden" name="img" value="<?=$rows['image'];?>">
					<img src="upload_image/<?=$rows['image'];?>" width="400" height="300"/></div>
				</div><!--/.division_three-->

					<?php
				}
				?>
				
				<div class="division_two">
					<div class="left">change Image:</div>
					<div class="right"><input type="file" accept="image/*" name="file" /></div>
				</div><!--/.division_three-->
				<div class="division_two">
					<div class="left"><input type="submit" name="update_accessories_product" value="Update Accessories Information"></div>
					<div class="right"><input 
					type="reset" name="reset"></div>
				</div><!--/.division_three-->
		</form>
		</div><!--/.product-detail accessories-->	

	</div><!--/.content-->		

</div><!--/.container-->
<script type="text/javascript" src="js/constructor.js"></script>
</body>
</html>