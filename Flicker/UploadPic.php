<?php
class UploadPic{
  private $file;
  private $tmpName;
  private $location;
  private $errors;
  private $fileUpload;
  private $errorFile;
  private $id;
  private $fileName;
  private $fileError;
  private $fileTemp;
  //private $files;

  public function __construct(){
    $this->errors = array();
    $this->location = 'pics/';
    $this->id = $_SESSION['id'];
    //$this->files = $_FILES;
    //var_dump(empty($this->files));
    //die();
  }

  public function isFile($files){

    $this->fileName = $files['imageFile']['name'];
    $this->fileError = $files['imageFile']['error'];
    $this->fileTemp = $files['imageFile']['tmp_name'];
    
    if(empty($this->fileName)){
      $this->errors[] = " ";
    }
    else{
        $this->fileUpload = move_uploaded_file($this->fileTemp, $this->location.$this->fileName);
        var_dump($this->fileUpload);
        if(!$this->fileUpload){
          if($this->fileError == 1)
                $this->errors[] = "File is too large. Please contact system adminstrator.";
          if($this->fileError == 7)
                $this->errors[] = "File permissions error. Please contact system administrator.";
        }

        require 'index.php';
        $select = "Select * from user where id = $this->id"; 
        $results = mysql_query($select);
        if(mysql_num_rows($results)>0){
          $insert = "INSERT into user_pic(id,pic_name) values((select id from user where id = '$this->id'),'$this->fileName')";
          $res = mysql_query($insert);
          if($res)
            return true;
        }
    }
        return count($this->errors)?0:1;
  }

  public function fileExists($fileName, $tempFile, $fileError){
    $this->file = $fileName;
    $this->tmpName = $tempFile;
    $this->errorFile = $fileError;
//    var_dump(is_null($this->file));
//    die();
    if(is_null($this->file)){
      $this->errors[] = "You have selected nothing to upload";
      echo "what";
 //     die();
    }
    else{
      $this->fileUpload = move_uploaded_file($this->tmpName, $this->location.$this->file);
      if(!$this->fileUpload){
        if($this->errorFile == 1){
                $this->errors[] = "File is too large. Please contact system adminstrator.";
                return count($this->errors)?0:1;
        }
      }
      else{
        //session_start();
        require 'index.php';
        $select = "Select * from user where id = $this->id";
        $results = mysql_query($select);
        if(mysql_num_rows($results)>0){
          $insert = "INSERT into user_pic(id,pic_name) values((select id from user where id = '$this->id'),'$this->file')";
          $res = mysql_query($insert);
          if($res)
            return true;
        }
        return true;
      }
    }
    return count($this->errors)?0:1;
  }
  
  public function showErrors(){
    foreach($this->errors as $error)
            echo $error;
  }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>