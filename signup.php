<!DOCTYPE html>
<html>
  <head>
<link rel="stylesheet" href="css/signup.css">
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" language="javascript">
       function a() {
         var name = document.signup.name.value;
         if (name == "") {
           alert("Name must be filled out");
           return false;
         }
         var x = document.signup.email.value;
         var atpos = x.indexOf("@");
         var dotpos = x.lastIndexOf(".");
         if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
           alert("Not a valid e-mail address");
           return false;
         }
      if(document.signup.pass1.value != "" && document.signup.pass1.value == document.signup.pass2.value) {
         if(document.signup.pass1.value.length < 8) {
           alert("Error: Password must contain at least eigth characters!");
           return false;
         }
         if(document.signup.name.value == document.signup.pass2.value) {
           alert("Error: Password must be different from Username!");
           return false;
         }
         var re = /[0-9]/;
         if(!re.test(document.signup.pass1.value)) {
           alert("Error: password must contain at least one number (0-9)!");
           return false;
         }
         var re = /[a-z]/;
         if(!re.test(document.signup.pass1.value)) {
           alert("Error: password must contain at least one lowercase letter (a-z)!");
           return false;
         }
         var re = /[A-Z]/;
         if(!re.test(document.signup.pass1.value)) {
           alert("Error: password must contain at least one uppercase letter (A-Z)!");
           return false;
         }
       }
       else {
         alert("Error: Please check that you've entered and confirmed your password!");
         return false;
       }
       var address = document.signup.address.value;
       if (address == "") {
         alert("address must be filled out");
         return false;
       }
     }
     </script>
   </head>
  <body>
    <div class="logo1">
      <img src="img/hamro.jpg" alt="" class="logo">
    </div>
    <div class="form">
      <h2 class="heading">Create account</h2>
      <form name="signup" method="post" action="admin/index_act.php" onsubmit="return a()">
        <div class="signup1">
          <strong>Your Name</strong>
        </div>
        <div class="signup2">
          <input type="text" name="name" value="">
        </div>
        <div class="signup1">
          <strong>Email</strong>
        </div>
        <div class="signup2">
          <input type="text" name="email" value=""><span id="availability"></span>
        </div>
        <div class="signup1">
          <strong>Address</strong>
        </div>
        <div class="signup2">
          <input type="text" name="address" value="">
        </div>
        <div class="signup1">
          <strong>Password</strong>
        </div>
        <div class="signup2">
          <input type="password" name="pass1" value="" placeholder="Atleast 8 character">
        </div>
        <div class="signup1">
          <strong>Retype Password</strong>
        </div>
        <div class="signup2">
          <input type="password" name="pass2" value="">
        </div>
        <div class="radio">
          <input type="radio" name="account" value="customer"><strong>Customer</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="account" value="supplier"><strong>Supplier</strong>
        </div>
        <div class="button_sign">
          <input type="submit" name="signup" value="Create your account" class="btn">
        </div>
      </form>
      <div class="a">
        Already have an account?<a href="login.php"> Sign in</a>
      </div>
    </div>
  </body>
</html>
