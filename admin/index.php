<?php include('include/connection.php');
include('include/login_check.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/chooseany.js"></script>

	<script type="text/javascript">
		
		function nameofproduct()
		{
			var x=document.getElementById('nameofproduct').value;
			document.getElementsByClassName('copiednameofproduct')[0].value=x;
			document.getElementsByClassName('copiednameofproduct')[1].value=x;
			document.getElementsByClassName('copiednameofproduct')[2].value=x;			
		}

		function user()
		{
			document.getElementById('user').style.display='block';
		}	

		function userout()
		{
			document.getElementById('user').style.display='none';
		}	

	</script>
</head>
<body>

<div class="container">
	<div class="sidebar">
		<ul>
			<li class="heading" style="font-size: 14px;cursor: pointer;" ><a onclick="user()" ><?=$_SESSION['username']?> <i class="fa fa-caret-down"></i></a><div onmouseleave="userout()"><ul id="user" style="cursor:pointer;width: 250px;height:80px;      background-color: red; position: relative; display: none;" ><li><a href="changepassword.php">change password</a></li><li><a href="logout.php">logout</a></li></ul></div></li><hr/>

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
				<label class="button" style="background: green;">Add product</label>	
			</div>
			<div class="division_three">
				<a href="product_info.php"><label class="button">View Product </label>	</a>
			</div>
		</div><!--/.content_navigation-->
		<div class="clear_fix"></div>		

		<div class="product_category">			
			<div class="division_two">
				<div class="left">Name of product</div>
				<div class="right"><input 
				type="text" onchange="nameofproduct()" id="nameofproduct"/></div>
			</div><!--/.division_three-->

			<div class="division_two">
				<div class="left">Product group</div>
				<div class="right">
					<select name="product_group" id="choose" onchange="choose_category()">
						<option disabled="disabled" selected="selected">Select your group</option>
						<option value="mobile_detail">Mobile</option>
						<option value="laptop_detail">Laptop</option>
						<option value="accessories">Accessories</option>						
					</select>
				</div>
			</div><!--/.division_three-->
		</div><!--/.product-category-->
		<div class="clear_fix"></div>		
			
		<div class="product_detail" id="mobile">
			<form action="add_product.php" method="post" enctype="multipart/form-data">		
				<input type="hidden" name="nop" class="copiednameofproduct" />
				<div class="division_three">
					<div class="left">
						Model:			
					</div>
					<div class="right">
						<input type="text" name="model">
					</div>
				</div>
				<!--/.model-->

				<div class="division_three">
					<div class="left">
						Color:			
						
					</div>
					<div class="right">
						<input type="text" name="color[]">
						<br/>
						<br/>
						<input type="text" name="color[]">
						<br/>
						<br/>
						<input type="text" name="color[]">
						
					</div>
				</div>
				<!--/.color-->

				<div class="division_three">
					<div class="left">
						Price:			
					</div>
					<div class="right">
						<input type="text" name="price">
					</div>
				</div>
				<!--/.price-->
				
				<div class="division_three">
					<div class="left">
						Display:			
					</div>
					<div class="right">
						<input type="text" name="display">
					</div>
				</div>
				<!--/.display-->

				<div class="division_three">
					<div class="left">
						RAM:			
					</div>
					<div class="right">
						<input type="text" name="ram">
					</div>
				</div>
				<!--/.RAM-->

				<div class="division_three">
					<div class="left">ROM :	</div>
					<div class="right">	<input type="text" name="rom"></div>
				</div>
				<!--/.ROM-->

				<div class="division_three">
					<div class="left">
						Front camera :			
					</div>
					<div class="right">
						<input type="text" name="fc">
					</div>
				</div>
				<!--/.Front-camera-->

				<div class="division_three">
					<div class="left">
						Back camera :			
					</div>
					<div class="right">
						<input type="text" name="bc">
					</div>
				</div>
				<!--/.Back-camera-->

				<div class="division_three">
					<div class="left">
						SIM :
					</div>
					<div class="right">
						<input type="text" name="sim">
					</div>
				</div>
				<!--/.sim-->


				<div class="division_three">
					<div class="left">
						CPU :
					</div>
					<div class="right">
						<input type="text" name="cpu">
					</div>
				</div>
				<!--/.cpu-->

				<div class="division_three">
					<div class="left">
						battery :
					</div>
					<div class="right">
						<input type="text" name="battery">
					</div>
				</div>
				<!--/.battery-->

				<div class="division_three">
					<div class="left">
						dimension :
					</div>
					<div class="right">
						<input type="text" name="dimension">
					</div>
				</div>
				<!--/.battery-->
				
				<div class="division_three">
					<div class="left">
						wifi :
					</div>
					<div class="right">
						<input type="text" name="wifi">
					</div>
				</div>
				<!--/.battery-->
				
				<div class="division_three">
					<div class="left">
						bluetooth :
					</div>
					<div class="right">
						<input type="text" name="bt">
					</div>
				</div>
				<!--/.battery-->

				<div class="division_three">
					<div class="left">
						network :
					</div>
					<div class="right">
						<input type="text" name="nw">
					</div>
				</div>
				<!--/.battery-->
				<div class="division_three">
					<div class="left">
						Operating System :
					</div>
					<div class="right">
						<input type="text" name="os">
					</div>
				</div>
				<!--/.os-->
				<div class="division_three">
					<div class="left">
						other :
					</div>
					<div class="right">
						<textarea name="others"></textarea>
					</div>
				</div>
				<!--/.battery-->
				<div class="clear_fix"></div>

				<div class="division_two">
					<div class="left">Upload Image:</div>
					<div class="right"><input type="file" accept="image/*" name="file" /></div>
				</div><!--/.division_three-->

				<div class="division_two">
					<div class="left"><input type="submit" name="add_mobile_product" value="Add Mobile Information"></div>
					<div class="right"><input 
					type="reset" name="reset"></div>

				</div><!--/.division_three-->
			</form><!--/.form-->
		</div><!--mobile detail-->
		


		<div class="product_detail" id="laptop">
			<form action="add_product.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="nameofproduct" class="copiednameofproduct" >
				<div class="division_three">
					<div class="left">
						Model:			
					</div>
					<div class="right">
						<input type="text" name="model">
					</div>
				</div>
				<!--/.model-->

				
				<div class="division_three">
					<div class="left">
						Price:			
					</div>
					<div class="right">
						<input type="text" name="price">
					</div>
				</div>
				<!--/.price-->
				
				<div class="division_three">
					<div class="left">
						Processor :			
					</div>
					<div class="right">
						<input type="text" name="processor">
					</div>
				</div>
				<!--/.display-->

				<div class="division_three">
					<div class="left">
						Generation :			
					</div>
					<div class="right">
						<input type="text" name="generation">
					</div>
				</div>
				<!--/.RAM-->

				<div class="division_three">
					<div class="left">
						Display :			
					</div>
					<div class="right">
						<input type="text" name="display">
					</div>
				</div>
				<!--/.ROM-->

				<div class="division_three">
					<div class="left">
						RAM :			
					</div>
					<div class="right">
						<input type="text" name="ram">
					</div>
				</div>
				<!--/.ram-->

				<div class="division_three">
					<div class="left">
						Hard drive :			
					</div>
					<div class="right">
						<input type="text" name="hd">
					</div> 
				</div>
				<!--/.hard drive-->

				<div class="division_three">
					<div class="left">
						Graphics :
					</div>
					<div class="right">
						<input type="text" name="graphics">
					</div>
				</div>
				<!--/.graphics-->


				<div class="division_three">
					<div class="left">
						Operating System :
					</div>
					<div class="right">
						<input type="text" name="os">
					</div>
				</div>
				<!--/.os-->

				<div class="division_three">
					<div class="left">
						Color option :
					</div>
					<div class="right">
						<input type="text" name="color">
					</div>
				</div>
				<!--/.color-->

				<div class="division_three">
					<div class="left">
						Weight :
					</div>
					<div class="right">
						<input type="text" name="weight">
					</div>
				</div>
				<!--/.battery-->
				
				<div class="division_three">
					<div class="left">
						Warrenty:
					</div>
					<div class="right">
						<select name="warrenty">
							<option disabled>select warrenty</option>
							<option value="1">1 year</option>
							<option value="2">2 year</option>
							<option value="0">no</option>
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
							<option disabled>select insurance</option>
							<option value="1">1 year</option>
							<option value="2">2 year</option>
							<option value="0">no</option>
						</select>
					</div>
				</div>
				<!--/.insurance-->

				<div class="division_three">
					<div class="left">
						Antivirus
					</div>
					<div class="right">
						Yes <input type="radio" name="av" value="yes">No <input type="radio" name="av" value="no">
					</div>
				</div>
				<!--/.antivirus-->

				<div class="division_three">
					<div class="left">
						Laptop bag
					</div>
					<div class="right">
						Yes <input type="radio" name="bag" value="yes"> No<input type="radio" name="bag" value="no">
					</div>
				</div>
				<!--/.laptop bag-->

				<div class="division_three">
					<div class="left">
						Others
					</div>
					<div class="right">
						<input type="text" name="others">
					</div>
				</div>
				<!--/.laptop bag-->
				<div class="clear_fix"></div>

				<div class="division_two">
					<div class="left">Upload Image:</div>
					<div class="right"><input type="file" accept="image/*" name="file"/></div>
				</div><!--/.division_three-->

				<div class="division_two">
					<div class="left"><input type="submit" name="add_laptop_product" value="Add Laptop Information"></div>
					<div class="right"><input 
					type="reset" name="reset"></div>
				</div><!--/.division_three-->
			</form><!--/.form-->
		</div><!--/.product-detail-->
		<!--/.laptop-->

		<div class="product_detail">
		<form action="add_product.php" method="post" enctype="multipart/form-data">
			<input type="text" name="nameofproduct" class="copiednameofproduct" hidden="hidden">
			<div class="division_three">
				<div class="left">
					Brand name:
				</div>
				<div class="right">
					<input type="text" name="bn">
				</div>
			</div>
			<!--/.model-->

			
			<div class="division_three">
				<div class="left">
					Price:			
				</div>
				<div class="right">
					<input type="text" name="price">
				</div>
			</div>
			<!--/.price-->
			<div class="clear_fix"></div>
			
			<h3>Features</h3>
			<div class="division_three">
				<div class="left">

					<input type="text" name="fn[]" placeholder="Feature Name:"><br/><br/>
					<textarea placeholder="Detail" rows="10" cols="40" name='fd[]'></textarea>
				</div>
			</div>
			<!--/.features-->
				<div class="division_three">
				<div class="left">

					<input type="text" name="fn[]" placeholder="Feature Name:"><br/><br/>
					<textarea placeholder="Detail" rows="10" cols="40" name="fd[]"></textarea>
				</div>
			</div>
			<!--/.features-->
				<div class="division_three">
				<div class="left">

					<input type="text" name="fn[]" placeholder="Feature Name:"><br/><br/>
					<textarea placeholder="Detail" rows="10" cols="40" name="fd[]"></textarea>
				</div>
			</div>
			<!--/.features-->

			<div class="clear_fix"></div>
			<div class="division_two">

				<div class="left">Upload Image:</div>
				<div class="right"><input type="file" accept="image/*" name="file"/></div>

			</div><!--/.division_three-->

			<div class="division_two">
				<div class="left"><input type="submit" name="add_accessories_product" value="Add Accessories Information"></div>
				<div class="right"><input 
				type="reset" name="reset"></div>

			</div><!--/.division_three-->
		</form>
		</div><!--/.product-detail accessories-->	

	</div><!--/.content-->		

</div><!--/.container-->

</body>
</html>