<?php
require 'config.php';
//session_start();
class LoginUser{

	private $username;
	private $password;
	private $errors;
	private $id;
	private $login;
	private $access;

	//private $token;

	public function __construct(){
		$this->errors = array();
		$this->login = isset($_POST['submit'])?1:0;
	
		$this->username = ($this->login)?$this->filter($_POST['username']):$_SESSION['username'];

		$this->access = 0;
		$this->id = 0;
		$this->password = ($this->login)?$this->filter($_POST['passwd']):'';		
		$this->password = ($this->login)?md5($this->password):$_SESSION['password'];
		
		//$this->password = md5($this->password);
		//$this->token = $_POST['token'];
	}

	public function welcomeScreen(){
		echo 'Welcome '.$this->username.'<br />';
	}

	public function isLogged(){
		($this->login)? $this->verifyInputs():$this->verifySession();
		return $this->access;
	}

	public function verifyInputs(){
		try{
			if(!$this->validData()){
				throw new Exception('Invalid Form Data');
			}

			if(!$this->database()){
				throw new Exception('Invalid Username and/or Password');
			}
			$this->access = 1;
			$this->registerSession();
		}
		catch(Exception $e){
			$this->errors[] = $e->getMessage();
		}
	}

	public function verifySession(){
		if($this->sessionExists() && $this->database()){
			$this->access = 1;
		}
	}


	public function showErrors(){
		foreach($this->errors as $key=>$value)
			echo $value.'<br />';
	}

	public function validData(){
		//var_dump(preg_match('/^[a-zA-Z0-9]{1,}$/',$this->username) && (preg_match('/^[a-zA-Z0-9]{1,}$/',$this->password)));
		
		//die();
		return (preg_match('/^[a-zA-Z0-9]{1,}$/',$this->username) && (preg_match('/^[a-zA-Z0-9]{1,}$/',$this->password)))?1:0;
	}

	public function registerSession(){
		$_SESSION['id'] = $this->id;
		$_SESSION['username'] = $this->username;
		$_SESSION['password'] = $this->password;
	}

	public function sessionExists(){
		return (isset($_SESSION['username']) && isset($_SESSION['password']))?1:0; 
	}
/*
	public function validToken(){
		if(isset($_SESSION['token']) || $this->token != $_SESSION['token'])
			$this->errors[] = "Invalid Submission";
		return count($this->errors)?0:1;
	}
*/
	public function database(){
		require 'config.php';
		$select = "SELECT * FROM user where username = '$this->username' and passwd = '".$this->password."'";
		
		$res = mysql_query($select);
		

		if(mysql_num_rows($res)){
			$row = mysql_fetch_assoc($res);
			$this->id = $row['id'];
			return true;
		}
		else{
				return false;
			}
	}

	public function filter($input){
		return preg_replace('/[^a-zA-Z0-9]/','',$input);
	}
}
?>