<?php include('admin/include/connection.php');?>
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

<div class="contents" style="margin-top: 70px; "" >
<?php 
	$model=$_GET['model'];
	$group=$_GET['group'];
	$query="select * from $group where model=$model";
	$query_run=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($query_run);
	if($group=='mobile_detail')
	{
		//  Array ( [model] => Ascend Mate7 [color] => black white [display] => 6.0 [ram] => 2 [rom] => 16 [front_camera] => 5 [back_camera] => 13 [os] => Android™ 4.4/HUAWE [cpu] => Hisilicon Kirin 925 4x1.8GHz + 4x1.3GHz + 1x230 [sim] => [battery] => 4100mAh [wifi] => Wi-Fi 802.11 a/b/g/n/ with Wi-Fi Direct suppor [bluetooth] => BT4.0 [network] => 2g,3g,4g [others] => [dimension] => 157.0mm x 81.0mm x 7.9mm [image] => img_con_bw_latest_phone192cb7b0e99c9ec502c8b41ee7b2b8eb9.jpg [price] => 0 [name_of_product] => Huawei [popular] => active ) 
?>
	<div class="heading" >
	<div class="container">
		<div class="division_three">
					<div class="left">
						<i class="fa fa-mobile"></i> Model : <?=$row['model'];?>
					</div>					
		</div>

		<div class="division_three">
		</div>

		<div class="division_three">
					<div class="right">
					<br/>
						Price in Rs : <?=$row['price'];?><br/>
								<a href="opencart.php?model='<?=$row['model']?>'&&group=mobile_detail"><button class="btn">Add to cart</button></a> <a href=""><button class="btn">Buy this product</button></a>

					</div>					
		</div>

		</div>
	</div>
	<!--/.heading -->

	<div class="product_detail">
		<div class="container">
			<div class="division_two" >
				<div class="left" style="height: 600px;">
					<img src="admin/upload_image/<?=$row['image'];?>" width="400px" height="400px" style="padding-right: 20px;">
				</div>
				<div class="right"></div>
			</div>
			<!--/.division_two-->
			<div class="division_two">
					
					<br/>
					<h1>Product Description</h1>
					<br/>
					<hr/>

					<p>
						Brand Name : <span style="font-size: 14px;"><?=$row['name_of_product']?></span>
					</p>
					<p>
						Display Name : <span style="font-size: 14px;"><?=$row['display']?></span>
					</p>
					<p>
						Ram : <span style="font-size: 14px;"><?=$row['ram']?></span>
					</p>

					<p>
						Rom : <span style="font-size: 14px;"><?=$row['rom']?></span>
					</p>
					<p>
						Camera : <span style="font-size: 14px;"><?=$row['front_camera']?> (FC), </span>
						<span style="font-size: 14px;"><?=$row['back_camera']?>(BC)</span>
					</p>
					<p>
						Cpu : <span style="font-size: 14px;"><?=$row['cpu']?></span>
						
					</p>
					<p>
						Wifi : <span style="font-size: 14px;"><?=$row['wifi']?></span>
						
					</p>
					<p>
						Network : <span style="font-size: 14px;"><?=$row['network']?></span>						
					</p>
					<p>
						Os : <span style="font-size: 14px;"><?=$row['os']?></span>						
					</p>

					<p>
						bluetooth : <span style="font-size: 14px;"><?=$row['bluetooth']?></span>						
					</p>
					<p>
						battery : <span style="font-size: 14px;"><?=$row['battery']?></span>						
					</p>
					<p>
						Color Available : <span style="font-size: 14px;"><?=$row['color']?></span>						
					</p>
					

					
					
			</div>
		</div>
	</div><!--/.product_detail-->

	<!--/. End of mobile detail-->

<!--Start of laptop detail-->
	<?php	}
	else if($group=='laptop_detail')
	{
		?>
	<div class="heading" >
		<div class="container">
		<div class="division_three">
					<div class="left">
						<i class="fa fa-laptop"></i> Model : <?=$row['model'];?>
					</div>					
		</div>

		<div class="division_three">
		</div>

		<div class="division_three">
					<div class="right">
					<br/>
						Price in Rs : <?=$row['price'];?><br/>
								<a href="opencart.php?model='<?=$row['model']?>'&&group=laptop_detail"><button class="btn">Add to cart</button></a> <a href=""><button class="btn">Buy this product</button></a>

					</div>					
		</div>

		</div>
	</div>
	<!--/.heading -->

	<div class="product_detail">
		<div class="container">
			<div class="division_two" >
				<div class="left" style="height: 600px;">
					<img src="admin/upload_image/<?=$row['image'];?>" width="400px" height="400px" style="padding-right: 20px;">
				</div>
				<div class="right"></div>
			</div>
			<!--/.division_two-->
			<div class="division_two">
					
					<br/>
					<h1>Product Description</h1>
					<br/>
					<hr/>

					<p>
						Brand Name : <span style="font-size: 14px;"><?=$row['nameofproduct']?></span>
					</p>
					<p>
						Display: <span style="font-size: 14px;"><?=$row['display']?></span>
					</p>
					<p>
						Ram : <span style="font-size: 14px;"><?=$row['ram']?></span>
					</p>

					<p>
						Hard Drive : <span style="font-size: 14px;"><?=$row['hd'];?></span>
					</p>
					
					
					<p>
						Processor : <span style="font-size: 14px;"><?=$row['processor']?></span>
						
					</p>
					<p>
						Generation : <span style="font-size: 14px;"><?=$row['generation']?></span>
						
					</p>
					<p>
						Graphics : <span style="font-size: 14px;"><?=$row['graphics']?></span>						
					</p>
					<p>
						Color : <span style="font-size: 14px;"><?=$row['color']?></span>						
					</p>

					<p>
						Weight : <span style="font-size: 14px;"><?=$row['weight']?></span>						
					</p>
					
					
					
			</div>
		</div>
	</div><!--/.product_detail-->

<!--/. End of laptop detail-->


<!--/.Start of accessories_detail-->
	<?php
	}
	else if($group=='accessories_detail')
	{
		?>
<div class="heading" >
	<div class="container">
		<div class="division_three">
					<div class="left">
							 Name : <?=$row['name_of_product'];?>
					</div>					
		</div>

		<div class="division_three">
		</div>

		<div class="division_three">
					<div class="right">
					<br/>
						Price in Rs : <?=$row['price'];?><br/>
					<a href="opencart.php?model='<?=$row['model']?>'&&group=accessories_detail"><button class="btn">Add to cart</button></a> <a href=""><button class="btn">Buy this product</button></a>

					</div>					
		</div>

		</div>
	</div>
	<!--/.heading -->

	<div class="product_detail">
		<div class="container">
			<div class="division_two" >
				<div class="left" style="height: 600px;">
					<img src="admin/upload_image/<?=$row['image'];?>" width="400px" height="400px" style="padding-right: 20px;">
				</div>
				<div class="right"></div>
			</div><!--/.division_two-->
			<div class="division_two">
					
					<br/>
					<h1>Product Description</h1>
					<br/>
					<hr/>

					<p>
						Model : <span style="font-size: 14px;"><?=$row['model']?></span>
					</p>
					
					<?php if(strlen($row['fd1'])!=0)
					{

					?>
					<p>
						<?=$row['fn1']?> : <span style="font-size: 14px;"><?=$row['fd1']?></span>
					</p>
					<?php	}?>

					<?php if(strlen($row['fd2'])!=0)
					{

					?>
					<p>
						<?=$row['fn2']?> : <span style="font-size: 14px;"><?=$row['fd2']?></span>
					</p>
					<?php	}?>

					<?php if(strlen($row['fd3'])!=0)
					{

					?>
					<p>
						<?=$row['fn3']?> : <span style="font-size: 14px;"><?=$row['fd3']?></span>
					</p>
					<?php	}?>
			</div><!--/.division_two-->
		</div>
	</div><!--/.product_detail-->
		<?php
	}
?>
<!--/. End of accessories detail-->
<hr/>
<div class="product_included"> 
	<div class="container">
	<div class="division_two">
	<br/>
		<h1>Whats included</h1>
		<br/>
		<hr/>
		<?php if($group=='laptop_detail')
		{
		?>
		<p>Product :<span style="font-size: 14px;"> <?=$row['nameofproduct']?></span>
		</p>
		<p>Antivirus :<span style="font-size: 14px;"> <?=$row['antivirus']?></span>
		</p>
		<p>Bag :<span style="font-size: 14px;"> <?=$row['bag']?></span>
		</p>
		<p>Warrenty :<span style="font-size: 14px;"> <?=$row['warrenty']?> year </span></p>
		<p>Insurance :<span style="font-size: 14px;"> <?=$row['insurance']?> year </span></p>
		<?php
		}
		else if ($group=='mobile_detail') {
			?>
			
		<p>Product :<span style="font-size: 14px;"> <?=$row['name_of_product']?></span></p>
		<p>Earphone :<span style="font-size: 14px;"> Yes</span></p>
		<p>Charger :<span style="font-size: 14px;"> Yes</span></p>
		<p>Warrenty :<span style="font-size: 14px;"> 1 year (mobile)</span><br/>
			<span style="font-size: 14px; margin-left:  80px"> 6 month (battery)</span>
		</p>
		
			<?php 
		}
		else if($group=="accessories_detail")
		{
			?>
			<!-- <?=print_r($row);?> -->
			<!-- Array ( [model] => deejay [price] => 3000 [fn1] => Package Dimensions [fd1] => 44.2 x 32.4 x 19.5 cm [fn2] => Item Weight [fd2] => 4.9 Kg [fn3] => Additional [fd3] => Bluetooth Home Theater System With FM USB AUX (Golden:Black) [name_of_product] => speaker [image] => b8d9f3fd8fcb0f527557cea2e75e8a1f.jpg [popular] => active ) 1  -->
			<p>Product :<span style="font-size: 14px;"> <?=$row['name_of_product']?></span></p>
			<p>Warrenty :<span style="font-size: 14px;"> 1 year </span><br/>
		

			<?php
		}
		?>
		

	</div><!--/.division two-->
	</div><!--/.container-->
</div><!--/.product delivery-->

<div class="product_delivery"> 
	<div class="container">
	<div class="division_two">
	<br/>
		<h1>Product Delivery</h1>
		<br/>
		<hr/>
		<p>Delivery :<span style="font-size: 14px;">Available throughout Nepal at extra charge. Please check your city. Product usually leaves our warehouse the next business day.</span>
		</p>
		<p>Store Pickup :<span style="font-size: 14px;">Usually Same Day or Next day.</span>
		</p>
		<p>Pasal Card Holder :<span style="font-size: 14px;"> Please provide your PASAL Card number at checkout for special services.</span>
		</p>

	</div><!--/.division two-->
	</div><!--/.container-->
</div><!--/.product delivery-->

</div><!--/.content-->
<div class="clearfix"></div>


<div class="footer">
	<div class="container_fluid">
		<div class="container">
			<div class="three_part">
			<h3>delivery area</h3>
			<h4>Inside Kathmandu</h4>
			<div class="area">
			<ul>
				<li>Samakhusi</li>
				<li>Balaju</li>
				<li>Banasthali</li>
				<li>Sundhara</li>
				<li>Newroad</li>
				<li>Sundhara</li>
				<li>Chabel</li>
			</ul>
			</div>
						
			</div>
			<div class="three_part">
				<h3>Follow us</h3>
				<div class="social_sites">
			<ul>
				<li><a href="#" class="fa fa-twitter"></a></li>
				<li><a href="#" class="fa fa-facebook"></a></li>
				<li><a href="#" class="fa fa-rss"></a></li>
				<li><a href="#" class="fa fa-pinterest"></a></li>
				<li><a href="#" class="fa fa-google-plus"></a></li>
				<li><a href="#" class="fa fa fa-dribbble"></a></li>

			</ul>
		</div><!--/.socialsites-->

			</div>
			<div class="three_part">
				<h3>About us</h3>
				Buy guinuene electronic goods from us. We served door to door delivery of goods.
				Payment can be done after recieving goods. 
				<table>
					<tr>
						<td>Location</td>
						<td > :  Nayabazar , Kathmandu</td>
					</tr>
					<tr>
						<td>Contact no	</td>
						<td > : 98********, 98**********</td>
					</tr>
					<tr>
						<td>Email	</td>
						<td > : pasal@gmail.com</td>
					</tr>
				</table>
			</div><!--/.three_part-->
		<div class="clearfix"></div>
		
		</div><!--/.container-->
		<div class="line"></div>
		<h3 align="center" style="padding-top: 5px;">pasal&copy2017 . All right reserved</h3>
	</div><!--/.container-fluid-->
</div><!--/.footer-->

	
	
</body>
</html>