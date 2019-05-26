<?php
include('include/connection.php');
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
        <h2 class="heading">Sign in</h2>
      <form action="act.php" method="post">
        <div class="signup1">
          Username Or Email
        </div>
        <div class="signup2">
          <input type="text" name="username" value="">
        </div>
        <div class="signup1">
          Password
        </div>
        <div class="signup2">
          <input type="password" name="password" value="">
        </div>
        <div class="a">
          <input type="submit" name="login" value="Login" class="button">
        </div>
        <div class="a-divider a-divider-break">
          <h5>New to Hamro?</h5>
        </div>
        <div class="sign_up_button">
          <a href="sign_up.php"><input type="button" name="login" value="Create an new account" class="btn"></a>
        </div>
      </form>
    </div>
  </body>
</html>
