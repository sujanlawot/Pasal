<?php
	 $array=array(
					'mobile'=>array('page'=>'mobile.php','table_name'=>'mobile_detail'),
					'laptop'=>array('page'=>'laptop.php','table_name'=>'laptop_detail'),
					'accessories'=>array('page'=>'accessories.php','table_name'=>'accessories_detail'));
	foreach ($array as $category => $key) 
	{		
?>
		<div class="dropdown">	
			<div class="container">
				<ul>
				<?php $query="Select distinct(name_of_product) from product where product_group='$category'";
						$query_run=mysqli_query($con,$query);
						while($rows=mysqli_fetch_assoc($query_run))
						{
							$page=$key['page'];
						?>
					<li><a onclick="detail(this.innerText,'<?=$page;?>')"><?=$rows['name_of_product'];?></a>
						<ul>
							<?php 
								$nop=$rows['name_of_product'];
								$table_name=$key['table_name'];
								$query1="select model from $table_name where name_of_product='$nop'";
								$query_run1=mysqli_query($con,$query1);
								while($row=mysqli_fetch_assoc($query_run1))
								{
									?>
									<a href="product_info.php?model='<?=$row['model']?>'&&group=<?=$table_name;?>"><li style="width: 250px;"><?=$row['model'];?></li></a>
										<?php
								}
								?>							
							
						</ul>
					</li>
					<?php } ?>
				
				</ul>
			</div>
			
		</div><!--/.dropdown-->
<?php 
	}	
?>
<div class="nav">
	<div class="container">
		<div class="nav_left">
			<ul>
				<li id="mobile"><a href="#" class="hide" onclick="navigationClick1()" >Mobile</a></li>
				<li id="laptop"><a href="#" class="hide" onclick="navigationClick2()" >Laptop</a></li>
				<li id="accessories"><a href="#" class="hide" onclick="navigationClick3()" >Accessories</a></li>
			</ul>
		</div><!--/.left-nav-->

		<div class="nav_center">
			<ul>			
				<li><a href="index.php">PASAL</a></li>			
			</ul>
		</div><!--/.nav-center-->

		<div class="nav_right">
			<ul>
				<?php 
					if(isset($_SESSION['login']))
					{
				?>
					<li onclick="user_option()" id="user_option"><a><?=$_SESSION['username'];?> <i class="fa fa-caret-down"></i></a>
						 <ul id="user">
						 	<li><a href="profile.php">View Profile</a></li>
						 	<li><a href="changepassword.php?id=<?=$_SESSION['id'];?>&&account=<?=$_SESSION['account']?>">change password</a></li>
						 	<li><a href="admin/logout.php">logout</a></li>	
						 </ul>
					</li>
				<?php
					}
					else
					{
				?>
					<li><a href="login.php"> login </a> / <a href="signup.php"> Signup </a></li>			
				<?php
					}
				?>				
				<li>
					<a href="opencart.php"><i class="fa fa-shopping-cart"></i>					
						<?php 
							$i=1;
							$x=count($_SESSION);
							$count=0;
							while($x>=$i)
							{
								if(isset($_SESSION['cart'.$x]))
								{
									$count++;	
								}						
								$x--;
							}	
							if($count!=0)
							{
						?>
						<span class="cart_info">						
						<?php
							echo $count;
							echo "</span>";
						}
						?>							
					</a>
				</li>			
				<li>
					<a href="#" onclick="opensearch()" id="searchform" style="position: relative;"><i class="fa fa-search"></i></a>
				</li>			
			</ul> 
		</div><!--/.left-right-->
	</div><!--/.container-->		
<div class="line"></div>
</div><!--/.nav-->
<div class="clearfix"></div>