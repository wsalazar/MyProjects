<?php
class ChangeCredentials{
  private $email;
  private $password;
  private $confPass;
  private $errors;
  private $oldEmail;
  private $newEmail;
  private $admin;

  public function __construct(){
    $this->errors = array();
    $this->email = isset($_POST['email'])?$_POST['email']:null;
    $this->password = isset($_POST['pass'])?$_POST['pass']:null;
    $this->confPass = isset($_POST['cpass'])?$_POST['cpass']:null;
    $this->oldEmail = isset($_POST['oEmail'])?$_POST['oEmail']:null;
    $this->newEmail = isset($_POST['nEmail'])?$_POST['nEmail']:null;
    $this->admin = isset($_POST['admin'])?1:0;
  }

  public function changeAdmin(){
    require 'index.php';
    session_start();
    //$userEmail = $_SESSION['email'];
    $update = "update user set access ='$this->admin' where email = '$this->email '";
    $results = mysql_query($update);
    if($results){
      return true;
    }
    else
      return false;
  }

  public function changeEmail(){
    session_start();
    require 'index.php';
    $select = "Select * from user where email = '$this->oldEmail'";
    $results = mysql_query($select);
    $rowResults = mysql_fetch_assoc($results);
    $update = "update user set email ='$this->newEmail' where email = ".$rowResults['email'];
    $updateResults = mysql_query($update);
    if($updateResults){
      $select = "Select * from user where email = '$this->oldEmail'";
      $results = mysql_query($select);
      $rowResults = mysql_fetch_assoc($results);
      $_SESSION['allow'] = $rowResults['access'];
      return true;
    }
    else
      return false;
  }
  
  public function validation(){
    if($this->validatePassword()){
           return $this->changePass();
    }
    else{
      return false;
    }
  }

  public function validatePassword(){
    if($this->password !== $this->confPass){
          return false;
    }
    else if($this->password == null || $this->confPass == null){
          return false;
    }
    else
      return true;

    //return count($this->errors)?0:1;
  }

  public function changePass(){
    require 'index.php';    
      $update = "update user set pass ='$this->password' where email = '$this->email'";
      $results = mysql_query($update);
    if($results){
      return true;
    }
    else
      $this->errors[] = "An error occurred please try again.";
    return count($this->errors)?0:1;
  }
  
  public function showErrors(){
    foreach($this->errors as $error)
            echo $error.'<br />';
  }
}

?>