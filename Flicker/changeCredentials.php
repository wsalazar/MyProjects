<?php
class ChangeCredentials{
  private $email;
  private $password;
  private $confPass;
  private $errors;
  private $oldEmail;
  private $newEmail;
  
  public function __construct(){
    $this->errors = array();
    $this->email = isset($_POST['email'])?$_POST['email']:'';
    $this->password = isset($_POST['pass'])?$_POST['pass']:'';
    $this->confPass = isset($_POST['cpass'])?$_POST['cpass']:'';
    $this->oldEmail = isset($_POST['oEmail'])?$_POST['oEmail']:'';
    $this->newEmail = isset($_POST['nEmail'])?$_POST['nEmail']:'';
  }

  public function changeEmail(){
    require 'index.php';    
    $update = "update user set email ='$this->newEmail' where email = '$this->oldEmail'";
    $results = mysql_query($update);
    if(results){
      return true;
    }
    else
      $this->errors[] = "Please try again";
    return count($this->errors)?0:1;
  }
  
  public function validation(){
    if($this->validatePassword()){
           return $this->changePass();
    }
    else{
      return count($this->errors)?0:1;
    }
  }

  public function validatePassword(){
    if($this->password !== $this->confPass){
          $this->errors[]="";
    }
    else if($this->password == null || $this->confPass == null)
          $this->errors[] = "";
    else
      return true;

    return count($this->errors)?0:1;
  }

  public function changePass(){
    require 'index.php';    
      $update = "update user set pass ='$this->password' where email = '$this->email'";
      $results = mysql_query($update);
    if(results){
      return true;
    }
    else
      $this->errors[] = "Please try again";
    return count($this->errors)?0:1;
  }
  
  public function showErrors(){
    foreach($this->errors as $error)
            echo $error.'<br />';
  }
}

?>