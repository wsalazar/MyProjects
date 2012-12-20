<?php
session_start();
$token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
if(isset($_POST['submit'])){
	require 'RegisterUser.php';
	$newUser = new RegisterUser();
	//var_dump($newUser);
	//var_dump($newUser->process());
	if($newUser->process())
		echo "Success";
	else
		$newUser->showErrors();
}
?>
<!DOCTYPE>
<html>
<head>
	<title>Picture Uploader-Register</title>
</head>
<body>
<a href="adminNav.php"><--Back</a>
<fieldset>
	<legend>Register</legend>
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	Username: <input type="text" name="username"/><br />
	Password: <input type="password" name="passwd"/><br />
	First Name: <input type="text" name="fname" /><br />
	Last Name: <input type="text" name="lname"/><br />
	<input type="hidden" name="token" value="<?=$token?>">
	<input type="submit" name="submit" value="Submit"/>
	</form>
</fieldset>

</body>
</html>