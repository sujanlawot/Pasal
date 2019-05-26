<?php
require_once("include/connection.php");
 if(isset($_POST['update_trending_product']))
{
	// $id=$_POST['id'];
	$nop=$_POST['nop'];
	$product_group=$_POST['product_group'];
	$model=$_POST['model'];
	$caption=$_POST['caption'];	
	$filename=$_POST['img'];
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

				  $query1="select image_name from trending where model='$model'";          
		          $query_run1=mysqli_query($con,$query1);
		          $row=mysqli_fetch_assoc($query_run1);
		          $img=$row['image_name'];
		          $file="upload_image/$img";
		          
		          if(!unlink($file))
		          {
		            $msg="Previous image not deleted";
		          }
			}					
		}
	}
	$query="update trending set image_name='$nop',caption='$caption',img_src='$filename',product_category='$product_group',model='$model' where model='$model';";	

// print_r($query);
// die();
// Error may occurs when user put model that doesnot match the model_name of mobile_detail or laptop_detail
		 $query_run=mysqli_query($con,$query);


				if($query_run)
				{
					$_SESSION['successmsg']="Successfully updated";
					header('location:trending_info.php');
				}
				else
				{								

					$_SESSION['errmsg']="Sorry not updated";	
					header('location:trending_info.php');
				}
	
}		
/*--/. End of trending product--*/


/*--/Start of mobile-update--*/

if(isset($_POST['update_mobile_product']))
{
	$old_model=$_POST['om'];
	$nop=$_POST['nop'];
	$model=$_POST['model'];	
	$colors=$_POST['color'];	
	$color=implode(" ",$colors);
	$price=$_POST['price'];
	$display=$_POST['display'];
	$ram=$_POST['ram'];
	$rom=$_POST['rom'];
	$fc=$_POST['fc'];
	$bc=$_POST['bc'];
	$sim=$_POST['sim'];
	$cpu=$_POST['cpu'];
	$battery=$_POST['battery'];
	$dimension=$_POST['dimension'];
	$wifi=$_POST['wifi'];
	$bt=$_POST['bt'];
	$nw=$_POST['nw'];
	$os=$_POST['os'];
	$others=$_POST['others'];
	$filename=$_POST['img'];
	


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

				  $query1="select image from mobile_detail where model='$old_model'";          
		          $query_run1=mysqli_query($con,$query1);
		          $row=mysqli_fetch_assoc($query_run1);
		          $img=$row['image'];
		          $file="upload_image/$img";
		          
		          if(!unlink($file))
		          {
		            $msg="Previous image not deleted";
		          }
			}					
		}
	}
	//End of image check...


	$query="UPDATE `mobile_detail` SET `model`='$model',`color`='$color',`display`='$display',`ram`='$ram',`rom`='$rom',`front_camera`='$fc',`back_camera`='$bc',`os`='$os',`cpu`='$cpu',`sim`='$sim',`battery`='$battery',`wifi`='$wifi',`bluetooth`='$bt',`network`='$nw',`others`='$others',`dimension`='$dimension',`image`='$filename',`price`='$price',`name_of_product`='$nop' WHERE `model`='$old_model'";
	$query1="UPDATE `product` SET `name_of_product`='$nop',`product_group`='mobile',`product_model`='$model' WHERE `product_model`='$old_model'";
	print_r($query);
	 $query_run=mysqli_query($con,$query);
$query_run2=mysqli_query($con,$query1);

				if($query_run && $query_run2)
				{
					$_SESSION['successmsg']="Successfully updated";
					header('location:product_info.php');
				}
				else
				{								

					$_SESSION['errmsg']="Sorry not updated";	
					header('location:product_info.php');
				}


}

//End of mobile update




//Start of laptop update

if(isset($_POST['update_laptop_product']))
{
	// Array ( [nameofproduct] => dell [model] => XPS13-I5-7Y54-8-256-WIN10-UT [price] => 244900 [processor] => 0 [generation] => 7 [display] => 13.0 [ram] => 8 [hd] => 256 [graphics] => intel hd [os] => window 10 [color] => [weight] => 1 [warrenty] => 1 [insurance] => 0 [av] => no [bag] => yes [others] => others [img] => 4ffdde793d331218ff547949402e077a.jpg [update_laptop_product] => Update Laptop Information )
	$old_model=$_POST['om'];
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
	$filename=$_POST['img'];


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

				  $query1="select image from laptop_detail where model='$old_model'";          
		          $query_run1=mysqli_query($con,$query1);
		          $row=mysqli_fetch_assoc($query_run1);
		          $img=$row['image'];
		          $file="upload_image/$img";
		          
		          if(!unlink($file))
		          {
		            $msg="Previous image not deleted";
		          }	
			}					
		}
	}
	//check file and insert new image end

	$query="UPDATE `laptop_detail` SET `model`='$model',`price`='$price',`processor`='$processor',`generation`='$generation',`display`='$display',`ram`='$ram',`hd`='$hd',`graphics`='$graphics',`os`='$os',`color`='$color',`weight`='$weight',`warrenty`='$warrenty',`insurance`='$insurance',`image`='$filename',`nameofproduct`='$nop',`others`='$others',`antivirus`='$av',`bag`='$bag' WHERE `model`='$old_model'";

	$query1="UPDATE `product` SET `name_of_product`='$nop',`product_group`='$product_group',`product_model`='$model' WHERE `product_model`='$old_model'";

		 $query_run=mysqli_query($con,$query);
		$query_run2=mysqli_query($con,$query1);

				if($query_run&&$query_run2)
				{
					$_SESSION['successmsg']="Successfully updated";
					header('location:product_info.php');
				}
				else
				{								

					$_SESSION['errmsg']="Sorry not updated";	
					header('location:product_info.php');
				}

	
}
//End of update laptop
//

//start of accessories
if(isset($_POST['update_accessories_product']))
{

	// Array ( [nameofproduct] => speaker [om] => vemex [model] => vemex [price] => 3000 [fn] => Array ( [0] => Package Dimensions [1] => Item Weight [2] => Additional ) [fd] => Array ( [0] => 44.2 x 32.4 x 19.5 cm [1] => 4.9 Kg [2] => Bluetooth Home Theater System With FM USB AUX (Golden:Black) ) [img] => b8d9f3fd8fcb0f527557cea2e75e8a1f.jpg [update_accessories_product] => Update Accessories Information ) 
	$old_model=$_POST['om'];

	$bn=$_POST['model'];
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

	$filename=$_POST['img'];

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
				$query1="select image from accessories_detail where model='$old_model'";          
		          $query_run1=mysqli_query($con,$query1);
		          $row=mysqli_fetch_assoc($query_run1);
		          $img=$row['image'];
		          $file="upload_image/$img";
		          
		          if(!unlink($file))
		          {
		            $msg="Previous image not deleted";
		          }
			}					
		}
	}

	
	$query="UPDATE `accessories_detail` SET `model`='$bn',`price`='$price',`fn1`='$fn0',`fd1`='$fd0',`fn2`='$fn1',`fd2`='$fd1',`fn3`='$fn2',`fd3`='$fd2',`name_of_product`='$nop',`image`='$filename' WHERE `model`='$old_model'";
	$query1="UPDATE `product` SET `name_of_product`='$nop',`product_group`='$product_group',`product_model`='$bn' WHERE `product_model`='$old_model'";
	
	$query_run=mysqli_query($con,$query);
	$query_run1=mysqli_query($con,$query1);
					if($query_run && $query_run1)
				{
					$_SESSION['successmsg']="Successfully updated";
					header('location:product_info.php');
				}
				else
				{			
					
					$_SESSION['errmsg']="Sorry not updated";	
					header('location:product_info.php');
				}




}
?>