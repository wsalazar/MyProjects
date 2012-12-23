<?php
session_start();

  if (isset($_SESSION['allow'])){
    $access = $_SESSION['allow'];
  }
  
  if (isset($_SESSION['email']))
    echo "Welcome ". $_SESSION['email'];
?>
<!DOCTYPE>
<html>
    <?php
     if($access  == 1){?>
      <title>Admin - Dashboard</title>
      <?php }
      else {?>
      <title>Dashboard</title>
      <?php }?>
  <body>
    <?php
     if($access  == 1){?>
    <h1>Admin - Dashboard</h1>
    <nav>
      <a href ="login.php">login</a>
      <a href ="view.php">view all users</a>
      <a href ="upload.php">upload</a>
      <a href ="logoff.php">logoff</a>
      <a href ="changepassword.php">change password</a>
      <a href ="changeEmail.php">change email</a>
    </nav>
    <?php }else{?>
    <h1>Dashboard</h1>
   
    <nav>
      <a href ="login.php">login</a>
      <a href ="view.php">view</a>
      <a href ="upload.php">upload</a>
      <a href ="logoff.php">logoff</a>
      <a href ="changepassword.php">change password</a>
    </nav>
     <?php }?>
  </body>
</html>