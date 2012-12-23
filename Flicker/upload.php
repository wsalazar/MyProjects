<?php
session_start();
echo "Welcome ".$_SESSION['email'].'<br />';
if(isset($_POST['upload'])){
  $name = $_FILES["imageFile"]["name"];
  $tempName = $_FILES["imageFile"]["tmp_name"];
  $fileError = $_FILES["imageFile"]["error"];
  $fileSize = $_POST['MAX_FILE_SIZE'];
  require 'UploadPic.php';
  $up = new UploadPic();
  if($up->fileExists($name, $tempName,$fileError)){
    header('location:dashboard.php');    
  }
  else
    $up->showErrors();          
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE>
<html>
  <head>
    <title>Dashboard</title>
  </head>
  <body>
    <nav>
      <a href ="login.php">login</a>
      <a href ="view.php">view</a>
      <a href ="dashboard.php">dashboard</a>
      <a href ="logoff.php">logoff</a>
      <a href ="#"></a>
    </nav>
    <form method="post" action="<?=$_SERVER['PHP_SELF']?> " enctype="multipart/form-data">
      Upload your file: <input type="file" name="imageFile"/><br />
      <input type="hidden" name="MAX_FILE_SIZE" value="128000"/>
      <input type="submit" name="upload" value="Upload"/>
    </form>
  </body>
</html>