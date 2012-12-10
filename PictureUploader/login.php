<?php
require_once('config.php');
$username = $_POST['username'];
$error = '';
$pass = $_POST['passwd'];

if(isset($username) && isset($pass) && $username !== '' && $pass !== ''){
	$query = "SELECT * FROM user WHERE username = "."'$username'"." and passwd = "."'$pass'";
	echo($query);
	$res = mysql_query($query);
	$row = mysql_fetch_assoc($res);
	$_SESSION['id'] = $row['id'];
	if($res || isset($_SESSION['login'])){
		$_SESSION['login'] = true;
		$_SESSION['user'] =  $_POST['username'];
		header("Location: dashboard.php");
	}
	else{
		$error = "Incorrect credentials.";
	}
}
?>
<!DOCTYPE>
<html>
<head>
	<title>Picture Uploader-Login</title>
</head>
<body>
<a href="adminNav.php"><--Back</a>
<fieldset>
	<?php if($error != '')
		echo $error;?>
	<legend>Login</legend>
	<form method="post">
	Username: <input type="text" name="username"/><br />
	Password: <input type="password" name="passwd"/><br />
	<input type="submit" name="submit" value="Submit"/>
	</form>
</fieldset>

</body>
</html>