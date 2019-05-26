<?php include('admin/include/connection.php');
?>
<?php
	if(isset($_GET['model']))
	{
		$i=1;
	$model=$_GET['model'];

	 while(isset($_SESSION['cart'.$i]))
	 {
	 	if($_SESSION['model'][$i]==$model)
	 	{
	 		break;
	 	}	 	
	 	$i++;
	 }
	 $_SESSION['cart'.$i]= $i;		
	$_SESSION['model'][$i]=$_GET['model'];
	$_SESSION['group'][$i]=$_GET['group'];	
	
	}
  	
	

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<script type="text/javascript" src="js/all.js"></script>
<script type="text/javascript" src="js/detail.js"></script>


<body>
	<?php 
	include('separate_detail.php');
	include('search.php');
	include('navigation.php');
?>

<div class="contents" style="margin-top: 70px; margin-bottom: 10px" >


<div class="container">
<form action="numberinitialise.php" method="post">
	<table frame="hsides" rules="rows" width="100%">
					<tr >
						<th width="400" height="50">Product</th>
						<th width="100">Price</th>
						<th width="250">Quantity</th>
						<th width="200">Total</th>
					</tr>

		
<?php 
	$i=1;
	 while(isset($_SESSION['cart'.$i]))
	 {

	 	$model=$_SESSION['model'][$i];
	 	$group=$_SESSION['group'][$i];		
		$query="select * from $group where model=$model";
		$query_run=mysqli_query($con,$query);
		
		$row=mysqli_fetch_assoc($query_run);
		if($row==false)
		{
			break;
		}


		?>
		
		<tr>
			<td align="center"><span style="line-height: 80px">
				<?php 
					if(isset($row['name_of_product']))
					{
						echo $row['name_of_product'];
					}
					else
					{
						echo $row['nameofproduct'];
					}
				?> <?=$row['model'];?>&nbsp&nbsp&nbsp</span> <img src="admin/upload_image/<?=$row['image']?>" width=50 height=50 align="middle">
			</td>
			
			<td align="center"> <input type="hidden" class="price" value="<?=$row['price']?>"><?=$row['price'];?>	</td>
			
			<td align="center">
				<select name="number[]" class="number" onchange="result();this.form.submit()" style="width: 40px; height: 30px; text-indent: 3px; margin-top: 10px;">
					<?php 
					
					if(isset($_SESSION['number'][$i-1]))					
					{
						
						if(($_SESSION['number'][$i-1])==1)
						{
							echo "<option value='1' selected>1</option>";
							echo "<option value='2' >2</option>";
							echo "<option value='3' >3</option>";
							echo "<option value='4' >4</option>";		
						}
						else if(($_SESSION['number'][$i-1])==2)
						{
							echo "<option value='1' >1</option>";
							echo "<option value='2' selected>2</option>";
							echo "<option value='3' >3</option>";
							echo "<option value='4' >4</option>";			
						}
						else if(($_SESSION['number'][$i-1])==3)
						{
							echo "<option value='1' >1</option>";
							echo "<option value='2' >2</option>";
							echo "<option value='3' selected>3</option>";
							echo "<option value='4' >4</option>";				
						}
							else if(($_SESSION['number'][$i-1])==4)
						{
							echo "<option value='1' >1</option>";
							echo "<option value='2' >2</option>";
							echo "<option value='3' >3</option>";
							echo "<option value='4' selected>4</option>";				
						}
						
					}
					else
					{
						echo $i;
							echo "<option value='1' selected>1</option>";
							echo "<option value='2' >2</option>";
							echo "<option value='3' >3</option>";
							echo "<option value='4' >4</option>";				
					}
					
					?>
				</select>

				<a href="removecart.php?cart_id=<?=$_SESSION['cart'.$i]?>"><div class="btn" style="width: 60px; margin: 10px;  height: 30px;line-height: 30px;"> Remove</div></a>
			</td>
			<td align="center" class="total">		</td>
			<input type="hidden" class="gt" value="">
		</tr>

		<?php
		$i++;
		
	 }
	
	
	?>



	
		
	<tr>
		<td colspan="3" align="right" height="50">Grand Total: </td>
		<td id="grandTotal" align="center"></td>
		

	</tr>	
</table>


</div><!--/.container-->
	
	<div class="section" style="height: 100px;margin: 40px 0;">
<div class="container" style="margin-top: 10px;">
	<a href="index.php"><div class="btn" style="width: 150px; padding:10px; height: auto">Continue Shopping</div></a>
	<div style="float:right">
	
		<a href="cash.php"><div class="btn"><img src="img/delivery.png"  style="width:75px; height:50px;padding: 10px 0px;">Cash on delivery</div></a>
	
		<div class="btn"><img src="img/store.png"  style="width:75px;height:50px;padding: 10px 0px;">Store pickup</div>
		<div class="btn"><img src="img/online.png"  style="width:75px;height:50px;padding: 10px 0px;">Pay online</div>
		
	</div>

</div>
<!--/.container-->
</div>
</form>
</div><!--/.contents-->
<div class="clearfix"></div>
		

<?php include('footer.php');	?>

</body>
</html>

