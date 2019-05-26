<?php
	session_start();
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
      <img src="img/hamro.jpg" alt="" class="logo">
    </div>
    <div class="form">
        <h2 class="heading">Sign in</h2>
      <form class="" action="admin/index_act.php" method="post">
        <div class="signup1">
          Email
        </div>
        <div class="signup2">
          <input type="text" name="email" value="">
        </div>
        <div class="signup1">
          Password
        </div>
        <div class="signup2">
          <input type="password" name="pass" value="">
        </div>
        <div class="a">
          <input type="submit" name="login" value="Log in" class="button">
        </div>
        <div class="a-divider a-divider-break">
          <h5>New to Hamro?</h5>
        </div>
        <div class="sign_up_button">
          <a href="signup.php"><input type="button" name="login" value="Create an new account" class="btn"></a>
        </div>
      </form>
    </div>
  </body>
</html>
