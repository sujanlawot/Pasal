<div class="trending" onclick="hidenavigation()">
	<div class="container_fluid">
	<div class="slider">
		<?php 
				$query="Select * from trending where status='active'";
				$query_run=mysqli_query($con,$query);				
				while($rows=mysqli_fetch_assoc($query_run))
				{					
		?>	
					<div class="item">
							<a href="product_info.php?model='<?=$rows['model']?>'&&group=<?=$rows['product_category']?>">
								<img src="admin/upload_image/<?=$rows['img_src'];?>">
							</a>
				
							<div class="caption_desc"><h4><?=$rows['caption']?></h4></div>		
					</div><!--/.item-->		
		<?php 
				}				

		?>
				<a href="#" class="next">
					<div class="arrow-left">
						<span><i class="fa fa-arrow-left"  alt="next"></i></span>
					</div>
				</a><!--/.Next icon-->

				<a href="#" class="prev">
					<div class="arrow-right">
						<span><i class="fa fa-arrow-right" alt="previous"></i></span>				
					</div>
				</a><!--/.previous icon-->
		
	</div><!--/.slider-->
	</div><!--/.container_fluid-->
</div><!--/.trending-->