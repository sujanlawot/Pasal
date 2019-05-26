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