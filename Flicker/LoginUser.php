<?php
class LoginUser{
  private $email;
  private $password;
  private $errors;
  private $randomPass;
  
  public function __construct(){
    $this->errors = array();
    $this->email = isset($_POST['email'])?$_POST['email']:'';
    $this->password = isset($_POST['pass'])?$_POST['pass']:'';
    $this->userSession();
  }

  public function forgotPassword($num){
    return $this->generateRandom($num);
  }

  public function seed(){
    list($first, $second) = explode(" ",microtime());
    return (float) $second +((float)$first*100000);
  }

  public function sendMail(){
    require_once 'Mail.php';
    require_once 'mail.php';
    $to = $this->email;
    $subject = 'New Password Generator';
    $from = 'will.a.salazar@gmail.com';
    $message = 'Hello Dolly,'."\r\n".'This is just a test I am doing for my flickr thing.'."\r\n";
    $message .= 'By the way your new password for my application since you need to log in is '.$this->randomPass.'.';
    $headers = array(
      'From'    =>  $from,
      'To'      =>  $to,
      'Subject' =>  $subject,
      'CC'      =>  $from
      );
    $smtpMail = Mail::factory('smtp', $smtp);
    $mail = $smtpMail->send($to,$headers,$message);
    if(PEAR::isError($mail)){
      echo '<p>'.$mail->getMessage().'</p>';
    }
    else
      return true;
    
  }
  
  public function generateRandom($num){
    $string = '';
    $characters = "abcdefghijklmnopqrstuvwxyz0123456789";

    for ($i = 0; $i < $num; $i++) {
      srand($this->seed());
      $string .= $characters[rand(0, strlen($characters) - 1)];
    }
    $this->randomPass = $string;
    //echo $string;
      return true;
  }

  public function userSession(){
    $_SESSION['email'] = $this->email;
  }

  public function updatePass(){
    require_once 'index.php';
    $update = "update user set pass ='$this->randomPass' where email = '$this->email'";
    $results = mysql_query($update);
    if($results)
      return true;
    else
      $this->errors[] = "Error please try again.";
    return count($this->errors)?0:1;
  }
  
  public function validation(){
    if($this->validateInput()){
           return $this->loginUser();
    }
    else{
      return count($this->errors)?0:1;
    }
  }
  
  public function validateInput(){
    if(empty($this->email)){
      $this->errors[] = "Email is invalid";
    }
    if(empty($this->password)){
      $this->errors[] = "Password is invalid";
    }
    return count($this->errors)?0:1;
  }
  
  public function loginUser(){
    require 'index.php';
    $select = "SELECT * from user where email = '$this->email' and pass = '$this->password'";
    //echo $select;
    $results = mysql_query($select);
    if(mysql_num_rows($results)==0)
      $this->errors[] = "Invalid email/password";
    else{      
      if($row = mysql_fetch_assoc($results)){
        $this->recordSessions($row);
         return true;
      }
    }
    return count($this->errors)?0:1;
  }
  
  public function recordSessions($row){
        $_SESSION['id'] = $row['id'];
        $_SESSION['allow'] = $row['access'];
        $_SESSION['email'] = $row['email'];
  }

  public function showErrors(){
    foreach($this->errors as $error)
            echo $error.'<br />';
  }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
