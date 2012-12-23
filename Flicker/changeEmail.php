<?php
if(isset($_POST['submit'])){
  require 'ChangeUser.php';
  $change = new ChangeUser();
  if($change->changeEmail()){
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
    <title>Change Email</title>
    <script type="text/javascript">
      function Confirm(){
        var email = document.getElementById('email');        
        if(!email.value)
          alert("Fields can not be blank");
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
      Please type in your old email: <input type="text" name="oEmail"><br />
      Please type in your new email: <input type="text" name="nEmail"><br />
      <input type="submit" name="submit" value="Change Email">
    </form>
  </body>
</html>
