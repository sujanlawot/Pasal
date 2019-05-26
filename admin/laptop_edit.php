
<?php include('include/connection.php');
	if(!isset($_GET['product_model']))
		die();
	$model=$_GET['product_model'];
	$statement="select * from laptop_detail where model=$model";	
	$query=mysqli_query($con,$statement);	
	$rows=mysqli_fetch_assoc($query);
	// echo $rows['model'];
	// print_r($rows);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- 	<script type="text/javascript" src="js/chooseany.js"></script> -->


</head>
<body>

<div class="container">
	<div class="sidebar">
		<ul>
			<li class="heading">UserName<!-- <ul><li>change password</li><li>logout</li></ul> --></li><hr/>
			<li><a class="active" href="index.php">Product</a></li>
			<li><a href="customer.php">Customer</a></li>
			<li><a href="supplier.php">Supplier</a></li>	
			<li><a href="trending.php">Trending</a></li>		
		</ul>		
	</div>
	<!--/.sidebar-->
	<div class="content">
	
		<div class="content_navigation">
			<div class="division_three">
				<label class="button" style="width: 300px; background: green">Edit laptop product</label>	
			</div>
			
		</div><!--/.content_navigation-->
		<div class="clear_fix"></div>			
		


		<div class="product_detail" id="laptop">
			<form action="update_product.php" method="post" enctype="multipart/form-data">
			<div class="division_two">
				<div class="left">Name of product</div>
				<div class="right"><input type="text" name="nameofproduct" value="<?=$rows['nameofproduct'];?>"/></div>
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
				
				<div class="division_three">
					<div class="left">
						Processor :			
					</div>
					<div class="right">
						<input type="text" name="processor" value="<?=$rows['processor'];?>">
					</div>
				</div>
				<!--/.display-->

				<div class="division_three">
					<div class="left">
						Generation :			
					</div>
					<div class="right">
						<input type="text" name="generation" value="<?=$rows['generation'];?>">
					</div>
				</div>
				<!--/.RAM-->

				<div class="division_three">
					<div class="left">
						Display :			
					</div>
					<div class="right">
						<input type="text" name="display" value="<?=$rows['display'];?>">
					</div>
				</div>
				<!--/.ROM-->

				<div class="division_three">
					<div class="left">
						RAM :			
					</div>
					<div class="right">
						<input type="text" name="ram" value="<?=$rows['ram'];?>">
					</div>
				</div>
				<!--/.ram-->

				<div class="division_three">
					<div class="left">
						Hard drive :			
					</div>
					<div class="right">
						<input type="text" name="hd" value="<?=$rows['hd'];?>">
					</div> 
				</div>
				<!--/.hard drive-->

				<div class="division_three">
					<div class="left">
						Graphics :
					</div>
					<div class="right">
						<input type="text" name="graphics" value="<?=$rows['graphics'];?>">
					</div>
				</div>
				<!--/.graphics-->


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
						Color option :
					</div>
					<div class="right">
						<input type="text" name="color" value="<?=$rows['color'];?>">
					</div>
				</div>
				<!--/.color-->

				<div class="division_three">
					<div class="left">
						Weight :
					</div>
					<div class="right">
						<input type="text" name="weight" value="<?=$rows['weight'];?>">
					</div>
				</div>
				<!--/.battery-->
				
				<div class="division_three">
					<div class="left">
						Warrenty:
					</div>
					<div class="right">
						<select name="warrenty">
						<?php if($rows['warrenty']==1)
						{
						?>
							<option disabled>select warrenty</option>
							<option value="1" selected>1 year</option>
							<option value="2">2 year</option>
							<option value="0">no</option>
						<?php 
						}
						else if($rows['warrenty']==2) 
						{
						?>
						<option disabled>select warrenty</option>
							<option value="1" >1 year</option>
							<option value="2" selected>2 year</option>
							<option value="0">no</option>
						<?php 
						}
						else
						{ ?>
							<option disabled>select warrenty</option>
							<option value="1" >1 year</option>
							<option value="2" >2 year</option>
							<option value="0" selected>no</option>

						<?php 
						}
						?>
						</select>

					</div>
				</div>
				<!--/.warrenty-->

				<div class="division_three">
					<div class="left">
						Insurance :
					</div>
					<div class="right">
						<select name="insurance">
							<?php if($rows['insurance']==1)
						{
						?>
							<option disabled>select insurance</option>
							<option value="1" selected>1 year</option>
							<option value="2">2 year</option>
							<option value="0">no</option>
						<?php 
						}
						else if($rows['insurance']==2) 
						{
						?>
						<option disabled>select insurance</option>
							<option value="1" >1 year</option>
							<option value="2" selected>2 year</option>
							<option value="0">no</option>
						<?php 
						}
						else
						{ ?>
							<option disabled>select insurance</option>
							<option value="1" >1 year</option>
							<option value="2" >2 year</option>
							<option value="0" selected>no</option>

						<?php 
						}
						?>
						</select>
					</div>
				</div>
				<!--/.insurance-->

				<div class="division_three">
					<div class="left">
						Antivirus
					</div>
					<div class="right">
					<?php if($rows['antivirus']=='yes')
					{
						?>
						Yes <input type="radio" name="av" value="yes" checked>No <input type="radio" name="av" value="no">
						<?php
					}
					else
					{
						?>
					Yes <input type="radio" name="av" value="yes" >No <input type="radio" name="av" value="no" checked>
						<?php
					}
					?>
					</div>
				</div>
				<!--/.antivirus-->

				<div class="division_three">
					<div class="left">
						Laptop bag
					</div>
					<div class="right">
						<?php if($rows['bag']=='yes')
					{
						?>
						Yes <input type="radio" name="bag" value="yes" checked> No<input type="radio" name="bag" value="no">
						<?php
					}
					else
					{
						?>
						Yes <input type="radio" name="bag" value="yes"> No<input type="radio" name="bag" value="no" checked>
						<?php
					}
					?>
					</div>
				</div>
				<!--/.laptop bag-->

				<div class="division_three">
					<div class="left">
						Others
					</div>
					<div class="right">
						<input type="text" name="others" value="<?=$rows['others']?>">
					</div>
				</div>
				<!--/.laptop bag-->
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
					<div class="left"><input type="submit" name="update_laptop_product" value="Update Laptop Information"></div>
					<div class="right"><input 
					type="reset" name="reset"></div>
				</div><!--/.division_three-->
			</form><!--/.form-->
		</div><!--/.product-detail-->
		<!--/.laptop-->

	
	</div><!--/.content-->		

</div><!--/.container-->
<script type="text/javascript" src="js/constructor.js"></script>
</body>
</html>