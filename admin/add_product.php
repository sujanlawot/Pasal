<?php
require_once("include/connection.php");
if(isset($_POST['add_mobile_product']))
{

	$colors=$_POST['color'];
	$color=implode(" ",$colors);
	
	
	
		$price=$_POST['price'];
		$name_of_product=$_POST['nop'];
		$product_group="mobile";
		$model=$_POST['model'];	
		$display=$_POST['display'];
		$ram=$_POST['ram'];
		$rom=$_POST['rom'];	$front_camera=$_POST['fc'];	$back_camera=$_POST['bc'];	$os=$_POST['os'];	$cpu=$_POST['cpu'];	$sim=$_POST['sim'];	$battery=$_POST['battery'];	$wifi=$_POST['wifi'];	$bluetooth=$_POST['bt'];	$network=$_POST['nw'];	$other=$_POST['others'];	$dimension=$_POST['dimension'];
		$filename="";

		/*-all variables are created that the data is obtained from form-*/
	

	if($_FILES['file']['name']!="")
	{			

		$name=$_FILES['file']['name'];
		$type=$_FILES['file']['type'];
		$tmp_name=$_FILES['file']['tmp_name'];
		$size=$_FILES['file']['size'];	
		$foldername="upload_image";
		if(!is_dir($foldername))//if(!is_dir($foldername))
			{
				mkdir($foldername);
			}
		
		$ext=['jpg','jpeg','png'];
		$ex=strtolower(pathinfo($name,PATHINFO_EXTENSION));
		$filename=pathinfo($name,PATHINFO_FILENAME);

		if(!in_array($ex,$ext))
		{
			echo "invalid file formate";
		}
		else
		{

			if($size>5242880)
			{
					$_SESSION['errmsg']="File too large..";	
					header('location:index.php');
			}
			else
			{
				$timename=md5(time());
				$filename=$timename.'.'.$ex;
				move_uploaded_file($tmp_name, $foldername."/".$filename);	
			}					
		}
	}
		$query="insert into mobile_detail values ('$model','$color','$display','$ram','$rom','$front_camera','$back_camera','$os','$cpu','$sim','$battery','$wifi','$bluetooth','$network','$other','$dimension','$filename','$price','$name_of_product','disabled');";
		$query1="insert into product(name_of_product,product_model,product_group) values('$name_of_product','$model','$product_group')";
	
		
				 $query_run=mysqli_query($con,$query);
				 $query1_run=mysqli_query($con,$query1);

				if($query_run && $query1_run)
				{
					$_SESSION['successmsg']="Successfully added";
					header('location:index.php');
				}
				else
				{			
					
					$_SESSION['errmsg']="Sorry not added";	
					header('location:index.php');
				}
}


//start of laptop
if(isset($_POST['add_laptop_product']))
{
	
	// Array ( [nameofproduct] => [model] => [price] => [processor] => [generation] => [display] => [ram] => [hd] => [graphics] => [os] => [color] => [weight] => [warrenty] => 1 [insurance] => 1 [others] => [add_laptop_product] => Add Laptop Information ) 
	// Array ( [nameofproduct] => [model] => XPS13-I5-7Y54-8-256-WIN10-UT [price] => 244900 [processor] => Core i5 [generation] => 7th [display] => 13.0 [ram] => 8 [hd] => 256GB SSD [graphics] => intel hd [os] => window 10 [color] => silver [weight] => 1.2 kg [warrenty] => 1 [insurance] => 1 [av] => no [bag] => no [others] => [add_laptop_product] => Add Laptop Information );

	
	$nop=$_POST['nameofproduct'];		
	$product_group="laptop";
	$model=$_POST['model'];
	$price=$_POST['price'];
	$processor=$_POST['processor'];
	$generation=$_POST['generation'];
	$display=$_POST['display'];
	$ram=$_POST['ram'];
	$hd=$_POST['hd'];
	$graphics=$_POST['graphics'];
	$os=$_POST['os'];
	$color=$_POST['color'];	
	
	$weight=$_POST['weight'];
	$warrenty=$_POST['warrenty'];
	$insurance=$_POST['insurance'];
	$av=$_POST['av'];
	$bag=$_POST['bag'];
	$others=$_POST['others'];
	$filename="";


	if($_FILES['file']['name']!="")
	{			

		$name=$_FILES['file']['name'];
		$type=$_FILES['file']['type'];
		$tmp_name=$_FILES['file']['tmp_name'];
		$size=$_FILES['file']['size'];	
		$foldername="upload_image";
		if(!is_dir($foldername))//if(!is_dir($foldername))
			{
				mkdir($foldername);
			}
		
		$ext=['jpg','jpeg','png'];
		$ex=strtolower(pathinfo($name,PATHINFO_EXTENSION));
		$filename=pathinfo($name,PATHINFO_FILENAME);

		if(!in_array($ex,$ext))
		{
			echo "invalid file formate";
		}
		else
		{

			if($size>5242880)
			{
					$_SESSION['errmsg']="File too large..";	
					header('location:index.php');
			}
			else
			{
				$timename=md5(time());
				$filename=$timename.'.'.$ex;
				move_uploaded_file($tmp_name, $foldername."/".$filename);	
			}					
		}
	}


	$query="INSERT INTO `laptop_detail`(`model`, `price`, `processor`, `generation`, `display`, `ram`, `hd`, `graphics`, `os`, `color`, `weight`, `warrenty`, `insurance`, `others`,image,popular,nameofproduct) VALUES ('$model','$price','$processor','$generation','$display','$ram','$hd','$graphics','$os','$color','$weight','$warrenty','$insurance','$others','$filename','disabled','$nop')";
	
	$query1="insert into product(name_of_product,product_model,product_group) values('$nop','$model','$product_group')";
	// print_r($query);
	// print_r($query1);
	// die();
	$query_run=mysqli_query($con,$query);
	$query_run1=mysqli_query($con,$query1);
	
	
	if($query_run && $query1_run)
	{
		$_SESSION['successmsg']="Successfully added";
		header('location:index.php');
	}
	else
	{					
		$_SESSION['errmsg']="Sorry not added";	
		header('location:index.php');
	}
}
//End of laptop--


//Accessories starts--
if(isset($_POST['add_accessories_product']))
{
// 	Array ( [nameofproduct] => speaker [bn] => Intex [price] => 2000 [fn] => Array ( [0] => Item Weight [1] => Item Width and height [2] => color ) [fd] => Array ( [0] => 998 g [1] => 14.8 x 17.7 Centimeters [2] => black ) [add_accessories_product] => Add Accessories Information ) 
	$bn=$_POST['bn'];
	$nop=$_POST['nameofproduct'];
	$price=$_POST['price'];
	$fns=$_POST['fn'];
	$fn0=$fns[0];
	$fn1=$fns[1];
	$fn2=$fns[2];
	$product_group="accessories";

	$fds=$_POST['fd'];
	$fd0=$fds[0];
	$fd1=$fds[1];
	$fd2=$fds[2];

	$filename="";
		/*-all variables are created that the data is obtained from form-*/
	if($_FILES['file']['name']!="")
	{			
		$name=$_FILES['file']['name'];
		$type=$_FILES['file']['type'];
		$tmp_name=$_FILES['file']['tmp_name'];
		$size=$_FILES['file']['size'];	
		$foldername="upload_image";
		if(!is_dir($foldername))//if(!is_dir($foldername))
			{
				mkdir($foldername);
			}
		
		$ext=['jpg','jpeg','png'];
		$ex=strtolower(pathinfo($name,PATHINFO_EXTENSION));
		

		if(!in_array($ex,$ext))
		{
			echo "invalid file formate";
		}
		else
		{

			if($size>5242880)
			{
					$_SESSION['errmsg']="File too large..";	
					header('location:index.php');
			}
			else
			{
				$timename=md5(time());
				$filename=	$timename.'.'.$ex;
				move_uploaded_file($tmp_name, $foldername."/".$filename);	
			}					
		}
	}

	$query="INSERT INTO `accessories_detail`(`model`, `price`, `fn1`, `fd1`, `fn2`, `fd2`, `fn3`, `fd3`, `name_of_product`, `image`,popular) VALUES ('$bn','$price','$fn0','$fd0','$fn1','$fd1','$fn2','$fd2','$nop','$filename','disabled')";
	$query1="insert into product(name_of_product,product_model,product_group) values('$nop','$bn','$product_group')";
	$query_run=mysqli_query($con,$query);
	$query_run1=mysqli_query($con,$query1);
					if($query_run && $query_run1)
				{
					$_SESSION['successmsg']="Successfully added";
					header('location:index.php');
				}
				else
				{			
					
					$_SESSION['errmsg']="Sorry not added";	
					header('location:index.php');
				}




}
//End of add accessories		

//Add trending product starts--				
if(isset($_POST['add_trending_product']))
{
	$nop=$_POST['nop'];
	$product_group=$_POST['product_group'];
	$model=$_POST['model'];
	$caption=$_POST['caption'];	
	$filename="";
		/*-all variables are created that the data is obtained from form-*/
	if($_FILES['file']['name']!="")
	{		
		echo "j";
		$name=$_FILES['file']['name'];
		$type=$_FILES['file']['type'];
		$tmp_name=$_FILES['file']['tmp_name'];
		$size=$_FILES['file']['size'];	
		$foldername="upload_image";
		if(!is_dir($foldername))//if(!is_dir($foldername))
			{
				mkdir($foldername);
			}
		
		$ext=['jpg','jpeg','png'];
		$ex=strtolower(pathinfo($name,PATHINFO_EXTENSION));
		

		if(!in_array($ex,$ext))
		{
			echo "invalid file formate";
		}
		else
		{

			if($size>5242880)
			{
					$_SESSION['errmsg']="File too large..";	
					header('location:index.php');
			}
			else
			{
				$timename=md5(time());
				$filename=	$timename.'.'.$ex;
				move_uploaded_file($tmp_name, $foldername."/".$filename);	
			}					
		}
	}
	$query="insert into trending(image_name,caption,img_src,product_category,model,status) values('$nop','$caption','$filename','$product_group','$model','disabled')";
		 $query_run=mysqli_query($con,$query);


				if($query_run)
				{
					$_SESSION['successmsg']="Successfully added";
					header('location:trending.php');
				}
				else
				{			
					

					$_SESSION['errmsg']="Sorry not added";	
					header('location:trending.php');
				}
	
}		
//add-trending product		

	

?>
