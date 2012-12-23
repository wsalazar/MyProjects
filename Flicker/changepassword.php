<?php
if(isset($_POST['submit'])){
  require 'ChangeUser.php';
  $change = new ChangeUser();
  if($change->validation()){
    header("location: dashboard.php");
  }
  else{
    $change->showErrors();
  }
}

?>
<!DOCTYPE>
<html>
  <head>
    <title>Change Password</title>
    <script type="text/javascript">
    //alert('hi');
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
      <a href ="dashboard.php">dashboard</a>
      <a href ="#"></a>
    </nav>
    <form method="post" action="<?=$_SERVER['PHP_SELF']?>" onsubmit="Confirm();">
      Please type in your email: <input type="text" name="email"><br />
      Password: <input type="password" name="pass"><br />
      Confirm New Password <input type="password" name="cpass"><br />
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
