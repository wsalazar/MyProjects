<?php
class ViewPics{
  
  private $id;
  private $image;
  private $location;
  private $number;
  private $delete;
  private $errors;
  private $access;
  private $adminEmail;
  
  public function __construct($delete = array()){
    $this->image = array();
    $this->errors = array();
    $this->delete = array();
    //$this->pid = array();
    $this->id = $_SESSION['id'];
    $this->location = 'pics/';
    $this->delete = $delete;
    $this->adminEmail = isset($_POST['userEmail'])?$_POST['userEmail']:'';
    
  }
  
  public function memberAccess(){
    require 'index.php';
    $select = "SELECT access from user where id = '$this->id'";
    //echo $select;
    $results = mysql_query($select);
    while($row = mysql_fetch_assoc($results)){
      $this->access = $row['access'];
    }
    
  }
  public function deleteImage(){
      
      foreach($this->delete as $delImage){
        //var_dump($delImage);
        
        //die();
        $fileName[] = basename($delImage);
        $imageArray = implode('\',\'',$fileName);
        $fileDeleted = unlink($delImage);
        if($fileDeleted)
          $deleted = true;
        else
          $deleted = false;
        
      }
        require 'index.php';
        $delete = "delete from user_pic where pic_name in ('$imageArray')";
        
        $results = mysql_query($delete);
        
        if($results && $deleted){
          return true;
        }
        else
          $this->errors[] = "Error in deleting image";
        return count($this->errors)?0:1;
  }
  
  public function retrieveImages(){
    //echo $this->access;
    require 'index.php';
    if(isset($this->email)){
       $select = "SELECT * from user_pic where email = '$this->email'";
      echo $select;
      $results = mysql_query($select);
      //var_dump($results);
      $num = mysql_num_rows($results);

      $this->number = $num;
      //if($num > 0){
      while($row = mysql_fetch_assoc($results)){
        $this->image[] = $this->location.$row['pic_name'];
      }

      return $this->image;
    }
    else if($this->access){
      
      $select = "SELECT * from user_pic where id = $this->id";
      //echo $select;
      $results = mysql_query($select);
      //var_dump($results);
      $num = mysql_num_rows($results);

      $this->number = $num;
      //if($num > 0){
      while($row = mysql_fetch_assoc($results)){
        $this->image[] = $this->location.$row['pic_name'];
      }

      return $this->image;
    }
    else{
      $select = "SELECT * from user_pic";
      //echo $select;
      $results = mysql_query($select);
      //var_dump($results);
      $num = mysql_num_rows($results);

      $this->number = $num;
      //if($num > 0){
      while($row = mysql_fetch_assoc($results)){
        $this->image[] = $this->location.$row['pic_name'];
      }

      return $this->image;
    }
  }
  
  public function getPicture(){
      return $this->location.$this->image['pic_name'];
  }
  
  public function showErrors(){
    foreach($this->errors as $showError)
            echo $showError;
  }
}
?>