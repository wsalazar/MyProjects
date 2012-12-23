<?php
session_start();
if(isset($_POST['submit'])){
  require 'LoginUser.php';
  $login = new LoginUser();

  if($login->forgotPassword(6)){
    if($login->updatePass()){
      if($login->sendMail())
        header("location: login.php");
    }
     else{
    $login->showErrors();
  }
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
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
