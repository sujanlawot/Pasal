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
				<a href="profile_edit.php"><div class="update_info">Update Info</div></a>
				<a href=""><div class="activity_log">View Activity Log</div></a>

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
			</div>
			<!--/.cover_page-->

					
				
				
			</div><!--/.container-fluid-->
		</div><!--/.slider-->

		<div class="slider" style="height: auto">
			<div class="container_fluid">
				<div class="personal_info" style="padding:60px;">
					<h2>Personal Information</h2>
					<hr>
					<div class="info_row">
						<div class="left" >Account holder</div>
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
						else if(isset($row['status']))
						{
							echo $row['status'];
						}
						?>							
						</div>
					</div>

					<div class="clearfix"></div>
					<div class="info_row">
						<div class="left">Name</div>
						<div class="right"><?=$row['username']?></div>
					</div>
					<div class="clearfix"></div>
					<div class="info_row">
						<div class="left">Email</div>
						<div class="right"><?=$row['email']?></div>
					</div>

					<div class="clearfix"></div>
					<div class="info_row">
						<div class="left">Phone Number</div>
						<div class="right"><?=$row['phone']?></div>
					</div>

					<div class="clearfix"></div>
					<div class="info_row">
						<div class="left">Address</div>
						<div class="right"><?=$row['address']?></div>
					</div>

					<div class="clearfix"></div>
					<div class="info_row">
						<div class="left">Others</div>
						<div class="right">............</div>
					</div>
					

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
</body>
</html>
<?php $email=$_SESSION['email'];
		// print_r($_SESSION);
		// print_r($query);
print_r($row);
?>