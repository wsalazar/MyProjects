<?php
session_start();
if(isset($_POST['submit'])){
  require 'LoginUser.php';
  $register = new LoginUser();
  if($register->validation()){
     //var_dump(isset($_SESSION['allow']));
//die();
    header("location: dashboard.php");
    
  }
  else{
    $register->showErrors();
  }
 
}

?>
<!DOCTYPE>
<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <nav>
      <a href ="register.php">register</a>      
      <a href ="login.php">login</a>
      <a href ="#"></a>
    </nav>
    <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
      email: <input type="text" name="email"><br />
      password: <input type="password" name="pass"><br />
      <input type="submit" name="submit" value="Submit">
      <a href="forgotpassword.php">forgot password</a>
    </form>
  </body>
</html>
