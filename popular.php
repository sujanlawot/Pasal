<?php
	 $array=array(
					'mobile'=>array('page'=>'mobile.php','table_name'=>'mobile_detail'),
					'laptop'=>array('page'=>'laptop.php','table_name'=>'laptop_detail'),
					'accessories'=>array('page'=>'accessories.php','table_name'=>'accessories_detail'));
	foreach ($array as $category => $key) 
	{		
?>
<div class="content" >
	<div class="container" >
		<div class="title">Popular <?=$category;?> in store</div>
		<div class="slider">
			<div class="container_fluid">
				<?php 
				$table_name=$key['table_name'];
						$query="Select * from $table_name where popular='active'";
						$query_run=mysqli_query($con,$query);
						while($rows=mysqli_fetch_assoc($query_run))
						{
				?>

				<div class="img">
					<img src="admin/upload_image/<?=$rows['image']?>"/>
					<div class="info">
						<table>
							<tr>
								<td width="100"><b><?=strtoupper($rows['name_of_product'])?> <br/><?=$rows['model']?></b></td>
								<td width="110"><b><?=$rows['price']?></b></td>
							</tr>
							
							<tr>
								<td><a href="opencart.php?model='<?=$rows['model']?>'&&group=<?=$table_name;?>"><button  class="btn">cart</button></a></td>
								<td><a href="product_info.php?model='<?=$rows['model']?>'&&group=<?=$table_name;?>"><button class="btn">View detail</button></a></td>
							</tr>							
						</table>
					</div><!--/.info-->
				</div><!--/.img with info-->		
				<?php
						}
				?>				
			</div><!--/.container-fluid-->
		</div><!--/.slider-->		
		<a href="<?=$key['page'];?>"><div class="view btn" >View All</div></a>
	</div><!--/.container-->
</div><!--/.content-->

<div class="clearfix"></div>
<div class="line"></div>
<!--/.End of MObile info-->
<?php
}
?>
