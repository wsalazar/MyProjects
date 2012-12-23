<?php

class RegisterUser{
  private $email;
  private $password;
  private $confPass;
  private $errors;
  private $access;
  
  public function __construct(){
    
    $this->errors = array();
    $this->email = $_POST['email'];
    $this->password = $_POST['pass'];
    $this->confPass = $_POST['cpass'];
    $this->access = isset($_POST['admin'])?1:0;
    $_SESSION['allow'] = $this->access;
  }
  
  public function validation(){
    if($this->validatePassword()){
           return $this->registerUser();
    }
    else{
      return count($this->errors)?0:1;
    }
  }

  public function validatePassword(){
    if($this->password !== $this->confPass){
          $this->errors[]="";
    }
    else
      return true;
  }
  /*
  public function validateInput(){
    if(empty($this->email)){
      $this->errors[] = "Email is invalid";
    }
    if(empty($this->password)){
      $this->errors[] = "Password is invalid";
    }
    
    if(is_null($this->confPass)){
      $this->errors[] = "Confirm password is invalid";
    }
    return count($this->errors)?0:1;
  }
  */
  public function registerUser(){
    require 'index.php';
    $select = "SELECT * from user where email = '$this->email' and pass = '$this->password'";
    $results = mysql_query($select);
    $row = mysql_fetch_assoc($results);
    //var_dump($row);
    //die();
    if($row)
      $this->errors[] = "This email is already in use.";
    else{
    $insert = "INSERT into user(email, pass, access) values('$this->email', '$this->password', '$this->access')";
    //echo $insert;
 
    $valid = mysql_query($insert);
    if($valid)
      return true;
    }
    return count($this->errors)?0:1;
  }
  public function showErrors(){
    foreach($this->errors as $error)
            echo $error.'<br />';
  }
}
?>