<?php
  session_start();
  require 'ViewPics.php';
  $delete = array();
  $delete = isset($_POST['pic'])?$_POST['pic']:null;
    
  $view = new ViewPics($delete);
  $view->memberAccess();
  
  if(isset($_POST['delete'])){
      if($view->deleteImage($delete))
              header('location: dashboard.php');
      else
        $view->showErrors();
  }
  
  
  session_start();
require 'index.php';
$email = $_SESSION['email'];
$select = "select * from user where email = '$email'";
$results = mysql_query($select);
while($row = mysql_fetch_assoc($results)){
  $access = $row['access'];
  //$view->retrieveImages();
  //var_dump($view);
  //$location = 'pics/';
  //require 'index.php';
   // $select = "SELECT * from user_pic where id = ".$_SESSION['id'];
    //echo $select;
   // $results = mysql_query($select);
    //var_dump($results);
} 
    
?>
<!DOCTYPE>
<html>
  <head>
    <title>View Uploads</title>
  </head>
  <body>
    <nav>
      <nav>
      <a href ="login.php">login</a>
      <a href ="view.php">view</a>      
      <a href ="dashboard.php">dashboard</a>
      <a href ="logoff.php">logoff</a>
   </nav>
      <form method="post"  action="<?=$_SERVER['PHP_SELF']?>">
        <?php
    if($access == 0){?>
          What user email would you like to view pictures of: <input type="text" name="userEmail">
          <input type="submit" name="adminSubmit" value="submit"><br />
          <?php 
        if(isset($_POST['adminSumbit'])){
         foreach($view->retrieveImages() as $images){?>
            delete?<input type="checkbox" name="pic[]" value="<?=$images?>"><img src="<?=$images?>" width="300px" heigh="300px">
       <?php        
              }       
           }
           else{
           foreach($view->retrieveImages() as $images){?>
              delete?<input type="checkbox" name="pic[]" value="<?=$images?>"><img src="<?=$images?>" width="300px" heigh="300px">    
      <?php 
      }}}
    
    
       else{
       foreach($view->retrieveImages() as $images){?>
          delete?<input type="checkbox" name="pic[]" value="<?=$images?>"><img src="<?=$images?>" width="300px" heigh="300px">
      <?php }}?>
          <br /><input type="submit" name="delete" value="Delete">
      </form>
  </body>
</html>