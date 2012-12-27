<?php

//session_start();
  if (isset($_SESSION['allow'])){
    $access = $_SESSION['allow'];
  }

require 'ChangeCredentials.php';
$change = new ChangeCredentials();
  
if(isset($_POST['changeEmail'])){
  if($change->changeEmail()){
    header("location: dashboard.php");
  }
  else
    $change->showErrors();
}
else if (isset($_POST['passwordCheck'])){
  if($change->validation()){
    header("location: dashboard.php"); 
  }
  else{
    $change->showErrors();
  }
}
else if(isset($_POST['adminCheck'])){
  if($change->changeAdmin())
   header("location: dashboard.php");  
  else
    $change->showErrors();
}


?>
<!DOCTYPE>
<html>
  <head>
    <title>Change Credentials</title>
    <script type="text/javascript">
      function emailCheck(){
        var oldEmail = document.getElementById('oldEmail');
        var newEmail = document.getElementById('newEmail');
        if(!oldEmail.value && !newEmail.value)
          alert("Fields can not be blank");
      }

      function passCheck(){
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
    <form method="post" action="<?=$_SERVER['PHP_SELF']?>" onsubmit="emailCheck();" name="emailForm">
      Please type in your old email: <input type="text" name="oEmail" id="oldEmail"><br />
      Please type in your new email: <input type="text" name="nEmail" id="newEmail"><br />
      <input type="submit" name="changeEmail" value="Change Email">
    </form>
    <form method="post" action="<?=$_SERVER['PHP_SELF']?>" onsubmit="passCheck();" name="passwordForm">
      Please type in your email: <input type="text" name="email"><br />
      Password: <input type="password" name="pass"><br />
      Confirm New Password <input type="password" name="cpass"><br />
      <input type="submit" name="passwordCheck" value="Change Password">
    </form>
<?php
if($access == 1){?>
    <form method="post" action="<?=$_SERVER['PHP_SELF']?>" name="adminForm">
       Please type in email of user: <input type="text" name="email"><br />
      admin: <input type="checkbox" name="admin" id="admin"><br />
      <input type="submit" name="adminCheck" value="Submit">
    </form>
<?php }?>

  </body>
</html>