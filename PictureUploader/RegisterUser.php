<?php
//require 'config.php';

class RegisterUser{

	private $username;
	private $firstName;
	private $lastName;
	private $password;
	private $errors;
	private $token;

	public function __construct(){
		$this->errors = array();
		$this->username = $this->filter($_POST['username']);
		$this->firstName = $this->filter($_POST['fname']);
		$this->lastName = $this->filter($_POST['lname']);
		$this->password = $_POST['passwd'];
		$this->password = md5($this->password);
		$this->token = $_POST['token'];
	}

	public function process(){
		//$this->validData();
		//if($this->validToken() && $this->validData()){
		if($this->validData()){
			return $this->registerUser();
		}
		return count($this->errors)?0:1;
	}

	public function showErrors(){
		foreach($this->errors as $key=>$value)
			echo $value.'<br />';
	}

	public function validData(){
		if(empty($this->username)){
			$this->errors[] = "Invalid or Empty field for username.";
		}
		if(empty($this->firstName)){
			$this->errors[] = "Invalid or Empty field for first name.";
		}
		if(empty($this->lastName)){
			$this->errors[] = "Invalid or Empty field for last name.";
		}
		if(empty($this->password)){
			$this->errors[] = "Invalid or Empty field for password.";		
		}

		return count($this->errors)?0:1;

	}

	

	public function validToken(){
		if(isset($_SESSION['token']) || $this->token != $_SESSION['token'])
			$this->errors[] = "Invalid Submission";
		return count($this->errors)?0:1;
	}

	public function registerUser(){
		require 'config.php';

		$select = "SELECT * FROM user";
		$selectRes = mysql_query($select);
		if($selectRow = mysql_fetch_assoc($selectRes)){
		//echo "hello";
			if($selectRow['username'] == $this->username){
				$this->errors[] = "This username already exists.";
				return count($this->errors)?0:1;
			}
			else if ($selectRow['fname'] == $this->firstName && $selectRow['lname'] == $this->lastName){
				$this->errors[] = "You already have an account.";
				return count($this->errors)?0:1;
			}
			else{
				$insert = "INSERT INTO user(fname,lname,username,passwd) VALUES('$this->firstName', '$this->lastName', '$this->username', '$this->password')";
				$insertRes = mysql_query($insert);
			}
		}
	}

	public function filter($input){
		return preg_replace('/[^a-zA-Z0-9@.]/','',$input);
	}
}
?>