<?php
require_once('include/connection.php');
if(isset($_POST['login']))
{
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select username,user,email from administrator_login where username='$username' and password='$password' or email='$username' and password='$password'";
	print_r($query);
	
	$query_run=mysqli_query($con,$query);
	
	$num=mysqli_num_rows($query_run);
	
	if($num==1)
	{
		
		
		$row=mysqli_fetch_assoc($query_run);

		if($row['user']=="sub-administrator")
		{
			
			$_SESSION['login']="active";
			$_SESSION['email']=$row['email'];
			$_SESSION['username']=$row['username'];						
			header('location:index.php');
			
		}
		else
		{
			$_SESSION['errmsg']="Unable to login. Please contact admin.";
			header('location:index.php');	
		}
	}

	else
	{
			$_SESSION['errmsg']="Invalid Username and Password.";
			header('location:login.php');	
	}

}

/*--/.login completed--*/
if(isset($_POST['register']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$query="insert into administrator_login(username,password,user,email) values(\"$username\",'$password','disabled','$email')";
	echo $query;
	
	$query_run=mysqli_query($con,$query);	
	
	if($query_run)    
	{
		$_SESSION['successmsg']="Please wait for email confirmation.";
		header('location:../index.php');		
	}
	else
	{
		$_SESSION['errmsg']="Unable to create your account";		
		header('location:login.php');			
	}

}

//start of change password

  if(isset($_POST['changepassword']))
  {
    print_r($_POST);
    // Array ( [id] => 1 [account] => customer [opass] => [npass] => [rpass] => [changepassword] => change ) 
    
    
    $opass=$_POST['opass'];
    $npass=$_POST['npass'];
    $email=$_SESSION['email'];
    $query="select * from administrator_login where email='$email' and password='$opass' ";
    

    $query_run=mysqli_query($con,$query);
    $number=mysqli_num_rows($query_run);
    // print_r($query);
    // print_r($number);
    // die();
    if($number==1)
    {
        $query="update administrator_login set password='$npass' where email='$email'";
       
        $query_run=mysqli_query($con,$query);
        if($query_run)
        {
            $_SESSION['successmsg']="Your new password has been update successfully";
            header('location:index.php');        
        }
        else
        {
            $_SESSION['errmsg']="Some error in system";
            header('location:index.php'); 
        }
    }
    else
    {
         $_SESSION['errmsg']="You entered wrong old password";
        header("location:changepassword.php");
    }
    

  }

  //end of change password
  


// if((!isset($_POST['register']))&&(!isset($_POST['login'])))
// {
// 			$_SESSION['errmsg']="Please login.";
// 			header('location:login.php');		
	
// }

 ?>


?>