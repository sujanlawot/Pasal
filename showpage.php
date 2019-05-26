<?php 
$product_group=$array['product_group'];
$table_names=$array['table_name'];
$pages=$array['page'];
?>
<?php include('admin/include/connection.php');?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$product_group;?> page</title>
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


<div class="content" style="padding-top: 60px">
	<div class="container" >
		<div class="title"><?=$product_group;?> in store</div>

		<div class="three_part">Price :&nbsp&nbsp&nbsp
		<br/><br/>
			<form action="<?=$pages?>" method="get">
			<input type="number" name="initial" min="10000"  step="5000" maxlength="6" style="width: 100px;margin-right:10px ;padding:2px;text-indent: 3px" value="<?php if(isset($_GET['initial'])){ echo $_GET['initial']; } else{ echo 1000; } ?>" onchange="this.form.submit()">
			 to 
			<input type="number" name="end" min="10000" step="5000" maxlength="6" style="width: 100px;margin-left:10px;padding:2px;text-indent: 3px;" value="<?php if(isset($_GET['end'])){ echo $_GET['end']; } else{ echo 150000; } ?>" onchange="this.form.submit()">
		</div><!--/.Price-->
		
		<div class="three_part">Product :&nbsp&nbsp&nbsp
		<br/><br/>		
			
			
				<select style="width:200px;margin-right:10px ;padding:2px;text-indent: 3px" name="choosemodel" onchange="this.form.submit()">
					<?php if(!isset($_GET['choosemodel']))
					{
						echo "<option value='all' selected>All</option>	";
					}
					else
					{						
							echo "<option value='all'>All</option>	";							
					}
					


						$query="select distinct(name_of_product) from product where product_group='$product_group'";

						$query_run=mysqli_query($con,$query);
						
						while($row=mysqli_fetch_assoc($query_run))
						{
							if(!isset($_GET['choosemodel']))
							{
								echo "<option value='".$row['name_of_product']."'>".$row['name_of_product']."</option>";	
							}
							else
							{
								if($_GET['choosemodel']!="all")
								{
									if(strtolower($row['name_of_product'])==strtolower($_GET['choosemodel']))
									{
										echo "<option selected value='".$row['name_of_product']."'>".$row['name_of_product']."</option>";			
									}
									else
									{
										echo "<option value='".$row['name_of_product']."'>".$row['name_of_product']."</option>";
									}
									
								}
								else
								{
									echo "<option value='".$row['name_of_product']."'>".$row['name_of_product']."</option>";
								}
								
							}
							
						}

						?>			
				</select>
			</form>

		</div><!--/.three_part brand-->
		<!--/comment $_POST['choosemodel'] is an name of product-->
		<!-- <div class="three_part">IOS/Android :&nbsp&nbsp&nbsp
		<br/><br/>
			<select>
			<option>Any version</option>
		</select>
		</div> -->
		<div class="slider" style="height: auto;overflow: none;border:none">
			<div class="container_fluid">

				<?php

				// Array ( [initial] => 10000 [end] => 150000 [choosemodel] => samsung )

				$query="select * from $table_names";

				if(isset($_GET['initial']) && isset($_GET['end']))
				{
					$query="Select * from $table_names where price>=".$_GET['initial']." and price<=".$_GET['end'];					
				}

				else if(isset($_GET['initial']))
				{
					$query="Select * from $table_names where price>=".$_GET['initial'];
				}

				else if(isset($_GET['end']))
				{
					$query="Select * from $table_names where price<=".$_GET['end'];
				}


				if(isset($_GET['choosemodel']))
				{
					
					if(isset($_GET['initial']) && isset($_GET['end']))
					{

						if($_GET['choosemodel']=="all")
						{
							$query="Select * from $table_names where price>=".$_GET['initial']." and price<=".$_GET['end'];	
						}
						else
						{
							$query="Select * from $table_names where price>=".$_GET['initial']." and price<=".$_GET['end']." and name_of_product='".$_GET['choosemodel']."'";
						}
											
					}	
					else if(isset($_GET['initial']))
					{
						if($_GET['choosemodel']=="all")
						{
							$query="Select * from $table_names where price>=".$_GET['initial'];							
						}
						else
						{
							$query="Select * from $table_names where name_of_product='".$_GET['choosemodel']."' and price>=".$_GET['initial'];
						}						

					}
					else if(isset($_GET['end']))
					{
						if($_GET['choosemodel']=="all")
						{
							$query="Select * from $table_names where price<=".$_GET['end'];	
						}
						else
						{
							$query="Select * from $table_names where price<=".$_GET['end']." and name_of_product='".$_GET['choosemodel']."'";
						}
					}
					else
					{
						if($_GET['choosemodel']=="all")
						{
							$query="Select * from $table_names";		
						}
						else
						{

							$query="Select * from $table_names where name_of_product='".$_GET['choosemodel']."'";		
						}
						
					}
				}

				
				$query_run=mysqli_query($con,$query);

				while($rows=mysqli_fetch_assoc($query_run))
					{
						?>
				<div class="img" style="position:relative;height:350px;padding: 25px 57px;">
					<img src="admin/upload_image/<?=$rows['image']?>" style="height:220px"/>
					<br/><br/>
					<div class="info" style="height:100%;position:relative;	   
    /*transition: all 0.8s linear;*/
		-webkit-transform: translate(0,0);
	   -moz-transform: translate(0,0);
	    -ms-transform: translate(0,0);
	     -o-transform: translate(0,0);
	        transform: translate(0,0);
	        background: none;
	        color:red;
">
						<table>
						<tr>
							<td width="100" ><b style="color:black"><?=strtoupper($rows['name_of_product'])?> <br/><?=$rows['model']?></b></td>
							<td width="110"><b style="color:black"><?=$rows['price']?></b></td>
						</tr>
							<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td><a href="opencart.php?model='<?=$rows['model']?>'&&group=<?=$table_name;?>"><button  class="btn">cart</button></a></td>
								<td><a href="product_info.php?model='<?=$rows['model']?>'&&group=<?=$table_name;?>"><button class="btn">View detail</button></a></td>
						</tr>		
							
						</table>
					</div>
				</div>		
						<?php
					}

				?>

				
				
			</div><!--/.container-fluid-->
		</div><!--/.slider-->
		<a href=""><div class="view btn" style="visibility: hidden;"  >View All</div></a>

	</div><!--/.container-->
</div><!--/.content-->
<div class="clearfix"></div>
<div class="line"></div>
<!--/.End of MObile info-->




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$("select[name='choosemodel']").change(function(){
	
	var name=$(this).val();
		var init=$("input[name='initial']").val();
		var end=$("input[name='end']").val();
		var tablename="accessories";
		$.ajax({
			url:"process.php",
			method:"post",
			data:
			{name:name,
			init:init,
			end:end,
			tablename:tablename},
			success:function(data)
			{
				console.log("success");

			}			
		});
		
	});
	
</script>
<?php include('footer.php');?>

</body>
</html>
