<?php
session_start();

if(isset($_POST['register'])){
  require 'RegisterUser.php';
  $register = new RegisterUser();
  if($register->validation()){
    echo "You have been successfully added.";
  }
  else{
    $register->showErrors();
  }
}
?>
<!DOCTYPE>
<html>
  <head>
    <title>Register</title>
    <script type="text/javascript">
      function Confirm(){
        var email = document.getElementById('email');
        var password = document.getElementById('pass');
        var confirmPassword = document.getElementById('cpass');
        if(!email.value && !password.value && !confirmPassword.value)
          alert("Fields can not be blank");
        if(password.value != confirmPassword.value)
          alert("Passwords do not match.");
      }
    </script>
  </head>
  <body>
    <nav>
      <a href ="register.php">register</a>      
      <a href ="login.php">login</a>
      <a href ="#"></a>
    </nav>
    <form method="post" action="<?=$_SERVER['PHP_SELF']?>" name="loginPage" onsubmit="Confirm();"> 
      email: <input type="text" name="email" id="email"><br />
      password: <input type="password" name="pass" id="pass"><br />
      confirm password: <input type="password" name="cpass" id="cpass"><br />
      admin: <input type="checkbox" name="admin"/><br />
      <input type="submit" name="register" value="Register" >
      
    </form>
  </body>
</html>
