<?php include('include/connection.php');
	if(!isset($_GET['product_model']))
		die();
	$model=$_GET['product_model'];
	$statement="select * from mobile_detail where model=$model";
	
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
				<label class="button" style="width: 300px; background: green">Edit Mobile product</label>	
			</div>
			
		</div><!--/.content_navigation-->
		<div class="clear_fix"></div>		



			
		<div class="product_detail" id="mobile">
			<form action="update_product.php" method="post" enctype="multipart/form-data">		

				<div class="division_two">
				<div class="left">Name of product</div>
				<div class="right"><input type="text" name="nop" value="<?=$rows['name_of_product'];?>"/></div>
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
						Color:			
						
					</div>

					<div class="right">
					<?php
					$color=explode(" ",$rows['color']);


					?>
						<input type="text" name="color[]" value="<?=$color[0];?>">
						<br/>
						<br/>

						<?php
						if (isset($color[1]))
						{
							echo "<input type='text' name='color[]' value='$color[1]'>";	
						}
						else
						{
							echo "<input type='text' name='color[]' >";	
						}
						?>
						<br/>
						<br/>
						<?php
						if (isset($color[2]))
						{
							echo "<input type='text' name='color[]' value='$color[2]'>";	
						}
						else
						{
							echo "<input type='text' name='color[]' >";	
						}
						?>
						
					</div>
				</div>
				<!--/.color-->

				<div class="division_three">
					<div class="left">
						Price:			
					</div>
					<div class="right">
						<input type="text" name="price" value="<?=$rows['price'];?>">
					</div>
				</div>
				<!--/.price-->
				
				<div class="division_three">
					<div class="left">
						Display:			
					</div>
					<div class="right">
						<input type="text" name="display" value="<?=$rows['display'];?>">
					</div>
				</div>
				<!--/.display-->

				<div class="division_three">
					<div class="left">
						RAM:			
					</div>
					<div class="right">
						<input type="text" name="ram" value="<?=$rows['ram'];?>">
					</div>
				</div>
				<!--/.RAM-->

				<div class="division_three">
					<div class="left">ROM :	</div>
					<div class="right">	<input type="text" name="rom" value="<?=$rows['rom'];?>"></div>
				</div>
				<!--/.ROM-->

				<div class="division_three">
					<div class="left">
						Front camera :			
					</div>
					<div class="right">
						<input type="text" name="fc" value="<?=$rows['front_camera'];?>">
					</div>
				</div>
				<!--/.Front-camera-->

				<div class="division_three">
					<div class="left">
						Back camera :			
					</div>
					<div class="right">
						<input type="text" name="bc" value="<?=$rows['back_camera'];?>">
					</div>
				</div>
				<!--/.Back-camera-->

				<div class="division_three">
					<div class="left">
						SIM :
					</div>
					<div class="right">
						<input type="text" name="sim" value="<?=$rows['sim'];?>">
					</div>
				</div>
				<!--/.sim-->


				<div class="division_three">
					<div class="left">
						CPU :
					</div>
					<div class="right">
						<input type="text" name="cpu" value="<?=$rows['cpu'];?>">
					</div>
				</div>
				<!--/.cpu-->

				<div class="division_three">
					<div class="left">
						battery :
					</div>
					<div class="right">
						<input type="text" name="battery" value="<?=$rows['battery'];?>">
					</div>
				</div>
				<!--/.battery-->

				<div class="division_three">
					<div class="left">
						dimension :
					</div>
					<div class="right">
						<input type="text" name="dimension" value="<?=$rows['dimension'];?>">
					</div>
				</div>
				<!--/.battery-->
				
				<div class="division_three">
					<div class="left">
						wifi :
					</div>
					<div class="right">
						<input type="text" name="wifi" value="<?=$rows['wifi'];?>">
					</div>
				</div>
				<!--/.battery-->
				
				<div class="division_three">
					<div class="left">
						bluetooth :
					</div>
					<div class="right">
						<input type="text" name="bt" value="<?=$rows['bluetooth'];?>">
					</div>
				</div>
				<!--/.battery-->

				<div class="division_three">
					<div class="left">
						network :
					</div>
					<div class="right">
						<input type="text" name="nw" value="<?=$rows['network'];?>">
					</div>
				</div>
				<!--/.battery-->
				<div class="division_three">
					<div class="left">
						Operating System :
					</div>
					<div class="right">
						<input type="text" name="os" value="<?=$rows['os'];?>">
					</div>
				</div>
				<!--/.os-->
				<div class="division_three">
					<div class="left">
						other :
					</div>
					<div class="right">
						<textarea name="others" value="<?=$rows['others'];?>"></textarea>
					</div>
				</div>
				<!--/.battery-->
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
					<div class="left"><input type="submit" name="update_mobile_product" value="Update Mobile Information"></div>
					<div class="right"><input 
					type="reset" name="reset"></div>

				</div><!--/.division_three-->
			</form><!--/.form-->
		</div><!--mobile detail-->
		


		
	</div><!--/.content-->		

</div><!--/.container-->
<script type="text/javascript" src="js/constructor.js"></script>
</body>
</html>