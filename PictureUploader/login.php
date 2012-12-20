<?php
//$username = $_POST['username'];
//$error = '';
//$pass = $_POST['passwd'];
session_start();
if(isset($_POST['submit'])){
	require 'LoginUser.php';
	$user = new LoginUser();
	if($user->isLogged()){
		header("Location: dashboard.php");
	}
	else{
		$user->showErrors();
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
	<legend>Login</legend>
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	Username: <input type="text" name="username"/><br />
	Password: <input type="password" name="passwd"/><br />
	<input type="submit" name="submit" value="Submit"/>
	</form>
</fieldset>

</body>
</html>