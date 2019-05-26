<?php include('admin/include/connection.php');?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<style type="text/css">

</style>
<script type="text/javascript" src="js/all.js">

</script>
<script type="text/javascript">
function clickFileCover()
{
	document.getElementById('cover').click();
}
function clickFileProfile()
{
	document.getElementById('profile').click();
}
	function enable(x)
	{

		document.getElementsByClassName('disabledInput')[x].removeAttribute('disabled');
		document.getElementsByClassName('edit_box')[x].style.display='block';
		document.getElementsByClassName('pencil')[x].style.display="none";

	}

	function edit_pencil(x)
	{
		var len=document.getElementsByClassName('pencil').length;
		while(len!=0)
		{
			if(len-1!=x)
			{
				document.getElementsByClassName('disabledInput')[len-1].setAttribute('disabled','disabled');
				document.getElementsByClassName('edit_box')[len-1].style.display='none';
				document.getElementsByClassName('pencil')[len-1].style.display='none';
				document.getElementsByClassName('disabledInput')[len-1].setAttribute('onmouseover','edit_pencil('+(len-1)+')');
			}
			len--;
		}
		document.getElementsByClassName('pencil')[x].style.display="block";	
		document.getElementsByClassName('disabledInput')[x].removeAttribute('onmouseover');
	}

</script>	
<body>
<div id="search">
					<div class="container">
					<form action="https://www.google.com.np/search" method="get" style="text-align: right">
						<input type="text" name="q" id="focus" style="width: 190px; text-indent: 5px;height:20px">
					</form>
					</div>
				</div><!--/.search-->


<div class="dropdown">
	
	<div class="container">
		<ul>
		<?php $query="Select distinct(name_of_product) from product where product_group='mobile'";
				$query_run=mysqli_query($con,$query);
				while($rows=mysqli_fetch_assoc($query_run))
				{


				?>
			<li><a href=""><?=$rows['name_of_product'];?></a>
				<ul>
					<?php 
						$nop=$rows['name_of_product'];
						$query1="select model from mobile_detail where name_of_product='$nop'";
						$query_run1=mysqli_query($con,$query1);
						while($row=mysqli_fetch_assoc($query_run1))
						{
							?>
							<a href="product_info.php?model='<?=$row['model']?>'&&group=mobile_detail"><li style="width: 250px;"><?=$row['model'];?></li></a>
								<?php
						}
						?>
					
					
				</ul>
			</li>
			<?php } ?>
		
		</ul>
	</div>
	
</div>

<div class="dropdown">
	
	<div class="container">
		<ul>
		<?php $query="Select distinct(name_of_product) from product where product_group='laptop'";
				$query_run=mysqli_query($con,$query);
				while($rows=mysqli_fetch_assoc($query_run))
				{


				?>
			<li><a href=""><?=$rows['name_of_product'];?></a>
				<ul>
					<?php 
						$nop=$rows['name_of_product'];
						$query1="select model from laptop_detail where nameofproduct='$nop'";
						$query_run1=mysqli_query($con,$query1);
						while($row=mysqli_fetch_assoc($query_run1))
						{
							?>
							<a href="product_info.php?model='<?=$row['model']?>'&&group=laptop_detail"><li style="width: 250px;"><?=$row['model'];?></li></a>
								<?php
						}
						?>
					
					
				</ul>
			</li>
			<?php } ?>
		
		</ul>
	</div>
	
</div>
<!--/.container-->
<div class="dropdown">
	
	<div class="container">
		<ul>
		<?php $query="Select distinct(name_of_product) from product where product_group='accessories'";
				$query_run=mysqli_query($con,$query);
				while($rows=mysqli_fetch_assoc($query_run))
				{


				?>
			<li><a href=""><?=$rows['name_of_product'];?></a>
				<ul>
					<?php 
						$nop=$rows['name_of_product'];
						$query1="select model from accessories_detail where name_of_product='$nop'";
						
						$query_run1=mysqli_query($con,$query1);
						while($row=mysqli_fetch_assoc($query_run1))
						{
							?>
							<a href="product_info.php?model='<?=$row['model']?>'&&group=accessories_detail"><li style="width: 250px;"><?=$row['model'];?></li></a>
								<?php
						}
						?>
					
					
				</ul>
			</li>
			<?php } ?>
		
		</ul>
	</div>
	
</div>
<!--/.container-->
	
</div>

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
				<li><a href="#">PASAL</a></li>			
			</ul>
		</div><!--/.nav-center-->

		<div class="nav_right">
			<ul>
				<?php if(isset($_SESSION['login']))
				{
				?>
				<li onclick="user_option()" id="user_option"><a><?=$_SESSION['username'];?> <i class="fa fa-caret-down"></i></a>
				 <ul id="user">
				 	<li><a href="profile.php">View Profile</a></li>
				 	<li><a href="changepassword.php">change password</a></li>
				 	<li><a href="admin/logout.php">logout</a></li>	
				 </ul>
				</li>
				<?php
					}else
					{?>
					<li><a href="login.php"> login </a> / <a href="signup.php"> Signup </a></li>			
					<?php
						}
						?>

				
				<li><a href="opencart.php" style="position: relative;"><i class="fa fa-shopping-cart"></i>
					
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
								?><span style="width: 15px;height: 15px;background-color: red ;display: inline-block;line-height: 16px;text-align: center;position: absolute;top: -8px;left: 8px;border-radius: 10px;font-size: 10px;font-weight: bold;">
								<?php
								echo $count;
								echo "</span>";
							}

						?>
					
				</a></li>			
				<li >
				<a href="#" onclick="opensearch()" id="searchform" style="position: relative;"><i class="fa fa-search"></i></a>
				

				</li>			
			</ul> 
		</div><!--/.left-right-->
	</div><!--/.container-->		
<div class="line"></div>
</div><!--/.nav-->

<div class="clearfix"></div>

<?php 
	// Array ( [account_type] => premium [account] => customer [username] => sujan [login] => 1 [email] => sujan.lawot@yahoo.com ) 
	$account=$_SESSION['account'];
	$email=$_SESSION['email'];
	$query="select * from $account where email='$email'";
	$query_run=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($query_run);

?>


<div class="content" style="padding-top: 60px" >
	<div class="container" >
		<!-- <div class="title">Profile page</div> -->
		
		<div class="slider" style="height: auto;overflow:visible;;">
			<div class="container_fluid">

				<div class="cover_page" style="z-index: 2;">
				<form action="admin/index_act.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="profileimage">
				<input type="hidden" name="email" value="<?=$row['email']?>">
				<input type="hidden" name="account" value="<?=$account;?>">
				<input type="file" name="cover" id="cover" accept="image/*" style="display: none" onchange="this.form.submit()">
				<input type="file" name="profile" id="profile" accept="image/*" style="display: none" onchange="this.form.submit()">
				<?php if($row['cover_pic']!="")
				{
					?>
					<img src="admin/upload_image/<?=$row['cover_pic']?>" width="100%" height="300px">
					<?php

					}
					else
						{
							echo "<div style='text-align:center;font-size:24px;padding-top:120px;text-transform:uppercase'>NO cover page</div>";
							}
					?>
				
				<div class="activity_log"  style="width: 150px; cursor: pointer" onclick="clickFileCover()">change cover pic</div>
				<div class="update_info" style="width: 150px;margin-right: 500px; z-index: 3;cursor: pointer;" onclick="clickFileProfile()">change profile pic</div>
				

				<div class="profile_pic">
				<?php if($row['profile_pic']!="")
				{
					?>
					<img src="admin/upload_image/<?=$row['profile_pic']?>" width="100%" height="160px">	
				<?php } else
				{
					echo "<div style='color:white;font-size:16px;text-transform:uppercase;text-align:center;padding-top:80px'>NO profile_pic</div>";
					}
					?>
				</div>
				<!--/.profile_pic-->			
				</form>
			</div>
			<!--/.cover_page-->

					
				
				
			</div><!--/.container-fluid-->
		</div><!--/.slider-->

		<div class="slider" style="height: auto">
			<div class="container_fluid">
				<div class="personal_info" style="padding:60px;">
					<h2>Personal Information</h2>
					<hr>
					<form action="admin/index_act.php" method="post">
					<input type="hidden" name="profile_edit" >
					<input type="hidden" name="account" value="<?=$account?>">
					<input type="hidden" name="oldemail" value="<?=$row['email']?>">
						<div class="info_row">
							<div class="left" >Account Type</div>
							<div class="right"><?=$account?></div>
						</div>

						<div class="clearfix"></div>
						<div class="info_row">
						<div class="left" >Account Type</div>
						<div class="right">
						<?php if(isset($row['account_type']))
						{
							echo $row['account_type'];
							}
							else
								{
									echo $row['status'];
								}
						?>							
						</div>


					</div>

					<div class="clearfix"></div>
						<div class="info_row" >
							<div class="left">Name</div>
							<label for="name" class="pencil" onclick="enable(0)"><i class="fa fa-pencil"></i></label>
							<div class="right" ><input class="disabledInput" onmouseover="edit_pencil(0)" type="text" name="username" id="name" value="<?=$row['username']?>" ></div>
						</div>

						<button class="right edit_box" onclick="this.form.submit()">Edit</button>
						<div class="clearfix"></div>
						<div class="info_row">
							<div class="left">Email</div>
							<label for="email" class="pencil" onclick="enable(1)"><i class="fa fa-pencil"></i></label>
							<div class="right"><input class="disabledInput" onmouseover="edit_pencil(1)" type="text" name="email" id="email" value="<?=$row['email']?>"></div>
						</div>
						<button class="right edit_box" onclick="this.form.submit()">Edit</button>
						<div class="clearfix"></div>
						<div class="info_row">
							<div class="left">Phone Number</div>
							<label for="phone" class="pencil"><i class="fa fa-pencil" onclick="enable(2)"></i></label>
							<div class="right"><input class="disabledInput" type="text" name="phone" onmouseover="edit_pencil(2)" id="phone" value="<?=$row['phone']?>"></div>
						</div>
						<button class="right edit_box" onclick="this.form.submit()">Edit</button>
						<div class="clearfix"></div>
						<div class="info_row">
							<div class="left">Address</div>
							<label for="address" class="pencil" onclick="enable(3)"><i class="fa fa-pencil"></i></label>
							<div class="right"><input class="disabledInput" type="text" name="address" id="address" onmouseover="edit_pencil(3)" value="<?=$row['address']?>"></div>
						</div>
						<button class="right edit_box" onclick="this.form.submit()">Edit</button>
						<div class="clearfix"></div>
						<div class="info_row">
							<div class="left">Others</div>
							<label for="others" class="pencil" onclick="enable(4)"><i class="fa fa-pencil"></i></label>
							<div class="right"><input class="disabledInput" onmouseover="edit_pencil(4)" type="text" name="others" id="others"></div>
						</div>
						<button class="right edit_box" onclick="this.form.submit()">Edit</button>
						
					</form>

				</div>
			</div>
		</div>
		<a href=""><div class="view btn" style="visibility: hidden;"  >View All</div></a>
		

	</div><!--/.container-->
</div><!--/.content-->
<div class="clearfix"></div>
<div class="line"></div>
<!--/.End of MObile info-->



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
				<li><a href="https://twitter.com/pasal" class="fa fa-twitter"></a></li>
				<li><a href="https://www.facebook.com/pasal" class="fa fa-facebook"></a></li>
				<li><a href="https://www.rss.com/pasal" class="fa fa-rss"></a></li>
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
<script type="text/javascript">
	function disabled()
	{
		var element=document.getElementsByClassName('disabledInput');
		var len=element.length;
		

		while(len!=0)
		{
			element[len-1].style.background = "none";
			element[len-1].setAttribute('disabled','disabled');
			document.getElementsByClassName('pencil')[len-1].style.display='none';
			len--;
		}

	}
	disabled();
</script>
</body>
</html>
