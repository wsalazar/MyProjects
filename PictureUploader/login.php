<?php
require('config.php');
session_start();
$username = $_POST['username'];
$pass = $_POST['passwd'];
$fName = $_POST['fname'];
$lName = $_POST['lname'];
$query = "SELECT * FROM user WHERE username = "."'$username'"." and passwd = "."'$pass'";
echo($query);
$res = mysql_query($query);
if($res)
header("location: dashboard.php");
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
	<form method="post">
	Username: <input type="text" name="username"/><br />
	Password: <input type="password" name="passwd"/><br />
	<input type="submit" name="submit" value="Submit"/>
	</form>
</fieldset>

</body>
</html>