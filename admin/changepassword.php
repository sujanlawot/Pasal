<?php
	include('include/connection.php');
  $email=$_SESSION['email'];
  $query="select * from administrator_login where email='$email'";
  
  $query_run=mysqli_query($con,$query);
  $row=mysqli_fetch_assoc($query_run);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">    
      <link rel="stylesheet" href="css/login.css">
    <title></title>
  </head>
  <body>
    <div class="">
      <img src="../img/hamro.jpg" alt="" class="logo">
    </div>
    <div class="form">
        <h2 class="heading"><big style="text-transform: uppercase;"><?=$row['user'];?></big></h2>
        <hr/>
      <form class="" action="act.php" method="post">
      
      
        <div class="signup1">
        <br/>
          Email: <b><?=$row['email']?></b>
          
        </div>
        <br/>
        
        <div class="signup1">
          Old password
        </div>
        <div class="signup2">
          <input type="password" name="opass" value="">
        </div>

        <div class="signup1">
          New password
        </div>
        <div class="signup2">
          <input type="password" name="npass" value="">
        </div>

        <div class="signup1">
          Re_enter password
        </div>
        <div class="signup2">
          <input type="password" name="rpass" >
        </div>
        <div class="a">
          <input type="submit" name="changepassword" value="change" class="button">
        </div>
        <div class="a-divider a-divider-break">
          <h5>New to Hamro?</h5>
        </div>
        <div class="sign_up_button">
          <a href="index.php"><input type="button" name="login" value="Go back" class="btn"></a>
        </div>
      </form>
    </div>
  </body>
</html>
