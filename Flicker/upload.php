<?php
session_start();
echo "Welcome ".$_SESSION['email'].'<br />';

if(isset($_POST['upload'])){

  $files = $_FILES;
  //$name = $_FILES["imageFile"]["name"];
  //$tempName = $_FILES["imageFile"]["tmp_name"];
  //$fileError = $_FILES["imageFile"]["error"];
  //$fileSize = $_POST['MAX_FILE_SIZE'];
  require 'UploadPic.php';
  $up = new UploadPic();

//var_dump(empty($_FILES));
//var_dump(empty($name));
//die();
/*
  if($up->fileExists($name, $tempName,$fileError)){
    header('location:dashboard.php');
  }
*/
//  var_dump($up->isFile($files));
//die();
  if($up->isFile($files)){
   header('location:dashboard.php'); 
  }
  else
    $up->showErrors();
}
?>

<!DOCTYPE>
<html>
  <head>
    <title>Dashboard</title>
  </head>
   <script type="text/javascript">
      function Confirm(){
        var file = document.getElementById('file');
        if(!file.value)
          alert("You must select an image to upload.");
      }
    </script> 
  <body>
    <nav>
      <a href ="login.php">login</a>
      <a href ="view.php">view</a>
      <a href ="dashboard.php">dashboard</a>
      <a href ="logoff.php">logoff</a>
      <a href ="#"></a>
    </nav>
    <form method="post" action="<?=$_SERVER['PHP_SELF']?> " enctype="multipart/form-data" onsubmit="Confirm();">
      Upload your file: <input type="file" name="imageFile" id="file"/><br />
      <input type="hidden" name="MAX_FILE_SIZE" value="128000"/>
      <input type="submit" name="upload" value="Upload"/>
    </form>
  </body>
</html>