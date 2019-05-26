<?php
require_once('include/connection.php');


  if (isset($_POST['login'])) 
  {
      $email = $_POST['email'];
      $pass = $_POST['pass'];
      $query1 = "select * from customer where email ='$email' and pass = '$pass' or username='$email' and pass='$pass'";
      $query2 = "select * from supplier where email ='$email' and pass = '$pass' or username='$email' and pass='$pass'";

      $run1 = mysqli_query($con,$query1);
      $run2 = mysqli_query($con,$query2);
      print_r(mysqli_num_rows($run1));
      print_r(mysqli_num_rows($run2));
      
      if(mysqli_num_rows($run1)==1)
      {
          $v = mysqli_fetch_assoc($run1);
          $_SESSION['login']=1;
          $_SESSION['account_type']=$v['account_type'];
          $_SESSION['account']="customer";          
          $_SESSION['username']=$v['username'];
          $_SESSION['email']=$v['email'];
          header('location:../index.php');
      }
      else if(mysqli_num_rows($run2)==1)
      {

          $v = mysqli_fetch_assoc($run2);
          if($v['status']=="disabled")
          {
            $_SESSION['errmsg']="Your account is not active. Please contact our office.";
            header('location:../index.php');
          }
          else
          {
            $_SESSION['login']=1; 
            $_SESSION['email']=$v['email'];
          $_SESSION['account']="supplier";
          $_SESSION['status']=$v['status'];
          $_SESSION['username']=$v['username'];
          header('location:../index.php');  
          }
          
      }
      else
      {
          $_SESSION['errmsg']="Invalid username and password";
          header('location:../index.php');
      }

      
      
  }// End of login



// start of signup
  if(isset($_POST['signup']))
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pass = $_POST['pass1'];
    $type = $_POST['account'];
    if ($type == "customer") {
      $query = "insert into customer(username,address,email,pass) values('$name','$address','$email','$pass');";
      $query_run=mysqli_query($con,$query);
      if($query_run)
      {
        $_SESSION['successmsg']="Signup successfully";
        header('location:../index.php');

      }
      else
      {
        $_SESSION['errmsg']="Cannot signup";
        header('location:../signup.php');
      }
      
    }
    else {

      $query = "insert into supplier(username,address,email,pass,status) values('$name','$address','$email','$pass','disabled');";
      
      
      $query_run=mysqli_query($con,$query);
      
          if($query_run)
      {
        $_SESSION['successmsg']="Signup successfully";
        header('location:../index.php');
        

      }
      else
      {
        
        $_SESSION['errmsg']="Cannot signup";
        header('location:../signup.php');
      }

    }  
  }

  //End of signup

  //start of change password

  if(isset($_POST['changepassword']))
  {
    
    // Array ( [id] => 1 [account] => customer [opass] => [npass] => [rpass] => [changepassword] => change ) 
    $email=$_POST['email'];
    $account=$_POST['account'];
    $opass=$_POST['opass'];
    $npass=$_POST['npass'];
    $query="select * from $account where pass='$opass' and email='$email'";
    

    $query_run=mysqli_query($con,$query);
    $number=mysqli_num_rows($query_run);
    // print_r($query);
    // print_r($number);
    // die();
    if($number==1)
    {
        $query="update $account set pass='$npass' where email='$email'";
       
        $query_run=mysqli_query($con,$query);
        if($query_run)
        {
            $_SESSION['successmsg']="Your new password has been updated successfully";
            header('location:../index.php');        
        }
        else
        {
             $_SESSION['errmsg']="Some error in system";
            header('location:../index.php'); 
        }
    }
    else
    {
         $_SESSION['errmsg']="You entered wrong old password";
        header("location:../changepassword.php");
    }
    

  }

  //end of change password
  
//start of profile_edit--//
  if(isset($_POST['profile_edit']))
  {
    $email=$_POST['oldemail'];
    $account=$_POST['account'];
    foreach($_POST as $keys=>$value)
    {
      $key=$keys;

    }
    $value=$_POST[$key];


    $query="update $account set $key='$value' where email='$email'";
    $query_run=mysqli_query($con,$query);
    if($query_run)
    {
      if($key=='email')
      {
        $_SESSION['email']=$value;
      }
      if($key=='username')
      {
        $_SESSION['username']=$value;
      }
       $_SESSION['successmsg']="Your $key has been updated successfully";
        header('location:../profile_edit.php');        
    }
    else
    {
         $_SESSION['errmsg']="Sorry Your $key has not been updated";
        header('location:../profile_edit.php'); 
    }


    }
  

  if(isset($_POST['profileimage']))
  {
   
    //Array ( [profileimage] => [email] => haridangol@gmail.com [account] => customer ) Array ( [cover] => Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 ) [profile] => Array ( [name] => water.jpg [type] => image/jpeg [tmp_name] => F:\xamp\tmp\php9716.tmp [error] => 0 [size] => 7772343 ) )


    // Array ( [profileimage] => [email] => haridangol@gmail.com [account] => customer ) Array ( [cover] => Array ( [name] => viber image.jpg [type] => image/jpeg [tmp_name] => F:\xamp\tmp\php315F.tmp [error] => 0 [size] => 102329 ) [profile] => Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 ) )

    // Array ( [profileimage] => [email] => sujan.lawot@yahoo.com [account] => customer ) Array ( [cover] => Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 ) [profile] => Array ( [name] => iPhone8inCopperGold-580x358.jpeg [type] => image/jpeg [tmp_name] => F:\xamp\tmp\phpA349.tmp [error] => 0 [size] => 27141 ) ) 
    $email=$_POST['email'];
    $account=$_POST['account'];
    if($_FILES['cover']['name']!="")
    {
       

        $name=$_FILES['cover']['name'];
        $type=$_FILES['cover']['type'];
        $tmp_name=$_FILES['cover']['tmp_name'];
        $size=$_FILES['cover']['size'];  
        $foldername="upload_image";    

        $ex=strtolower(pathinfo($name,PATHINFO_EXTENSION));
        

        $timename=md5(time());
        $filename=$timename.'.'.$ex;
        $x=move_uploaded_file($tmp_name, $foldername."/".$filename);
        if($x)
        {
          $query1="select cover_pic from $account where email='$email'";          
          $query_run1=mysqli_query($con,$query1);
          $row=mysqli_fetch_assoc($query_run1);
          $img=$row['cover_pic'];
          $file="upload_image/$img";
          
          if(!unlink($file))
          {
            $msg="Previous image not deleted";
          }
           $query="update $account set cover_pic='$filename' where email='$email'";
          $query_run=mysqli_query($con,$query);
          if($query_run)
          {
              $_SESSION['successmsg']="Your cover pic has been updated successfully";
              header('location:../profile_edit.php');        
          }
          else
          {
                $_SESSION['errmsg']="Your cover pic has not been updated ";
                header('location:../profile_edit.php'); 
          }
        }
      }
    if($_FILES['profile']['name']!="")
    {
       
        $name=$_FILES['profile']['name'];
        $type=$_FILES['profile']['type'];
        $tmp_name=$_FILES['profile']['tmp_name'];
        $size=$_FILES['profile']['size'];  
        $foldername="upload_image";    

        $ex=strtolower(pathinfo($name,PATHINFO_EXTENSION));
        

        $timename=md5(time());
        $filename=$timename.'.'.$ex;
        $x=move_uploaded_file($tmp_name, $foldername."/".$filename);
        if($x)
        {
          $query1="select profile_pic from $account where email='$email'";          
          $query_run1=mysqli_query($con,$query1);
          $row=mysqli_fetch_assoc($query_run1);
          $img=$row['profile_pic'];
          $file="upload_image/$img";          
          if(!unlink($file))
          {
            $msg="Previous image not deleted";
          }
          $query="update $account set profile_pic='$filename' where email='$email'";
          $query_run=mysqli_query($con,$query);
          if($query_run)
          {
              $_SESSION['successmsg']="Your profile pic has been updated successfully";
              header('location:../profile_edit.php');        
          }
          else
          {
                $_SESSION['errmsg']="Your profile pic has not been updated ";
                header('location:../profile_edit.php'); 
          }
        }
    }
    print_r($_POST);
    print_r($_FILES);
  }
 ?>

