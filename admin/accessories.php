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
	var product_detail=document.getElementsByClassName('product_detail')[0];
	product_detail.style.display='block';

}

</script>
</head>
<body>
<div class="container">
	<div class="sidebar">
	<ul>
		<li class="heading"><a href="#">Dashboard</a></li><hr/>
		<li><a href="#">Product</a></li>
		<li><a href="#">Customer</a></li>
		<li><a href="#">Supplier</a></li>		
	</ul>		
	</div>
	<!--/.sidebar-->
	<div class="content">
	<div class="slidedown">
		<label class="button"  id="add_product">Add product </label>
		
		<form action="add_product.php" method="post" enctype="multipart/form-data">			
		<div class="add_product">

		<div class="product_category">			
			<div class="division_two">
				<div class="left">Name of product</div>
				<div class="right"><input 
				type="text" name="" \></div>
			</div><!--/.division_three-->

			<div class="division_two">
				<div class="left">Product group</div>
				<div class="right">
					<select name="product_group" onchange="choose_category()">
						<option disabled="disabled" selected="selected">Select your group</option>
						<option value="mobile_detail">Mobile</option>
						<option value="laptop_detail">Laptop</option>
						<option value="accessories">Accessories</option>						
					</select>
				</div>
			</div><!--/.division_three-->
		</div><!--/.product-category-->
			<div class="clear_fix"></div>
		<div class="product_detail">
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

					<input type="text" name="topic[]" placeholder="Feature Name:"><br/><br/>
					<textarea placeholder="Detail" rows="10" cols="40"></textarea>
				</div>
			</div>
			<!--/.display-->
				<div class="division_three">
				<div class="left">

					<input type="text" name="topic[]" placeholder="Feature Name:"><br/><br/>
					<textarea placeholder="Detail" rows="10" cols="40"></textarea>
				</div>
			</div>
			<!--/.display-->
				<div class="division_three">
				<div class="left">

					<input type="text" name="topic[]" placeholder="Feature Name:"><br/><br/>
					<textarea placeholder="Detail" rows="10" cols="40"></textarea>
				</div>
			</div>
			<!--/.display-->

<div class="clear_fix"></div>
			<div class="division_two">

				<div class="left">Upload Image:</div>
				<div class="right"><input type="file" accept="image/*" /></div>

			</div><!--/.division_three-->

			<div class="division_two">
				<div class="left"><input type="submit" name="add_product" value="Add Mobile Information"></div>
				<div class="right"><input 
				type="reset" name="reset"></div>

			</div><!--/.division_three-->

		</div><!--/.product-detail-->	
		
		</form>
			
		

	</div><!--/.add-product-->
<div class="clear_fix"></div>
	

		<table border="1" style="border-collapse: collapse;">
			<tr>
				<th width="200" height="40">Name of product</th>
				<th width="200">Product Category</th>
				<th width="200">Product Model</th>
				<th width="300">Action</th>
			</tr>

			<tr >
				<td height="30">Samsung</th>
				<td>Mobile</th>
				<td>S7</th>
				<td><a href="" title="view"><i class="fa fa-eye" ></i></a><a href="" title="edit"><i class="fa fa-edit" ></i></a> <a href="#" title="delete"><i class="fa fa-trash-o" ></i></a></th>
			</tr>

			
		</table>
		


	</div><!--/.content-->
</div><!--/.container-->

</body>
</html>