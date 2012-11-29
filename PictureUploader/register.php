<?php
require('config.php');
$username = $_POST['username'];
$pass = $_POST['passwd'];
$fName = $_POST['fname'];
$lName = $_POST['lname'];
$query = "INSERT INTO user(fname,lname,username,passwd) VALUES('$fName', '$lName', '$username', '$pass')";
//die($query);
$res = mysql_query($query);
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
	<form method="post">
	Username: <input type="text" name="username"/><br />
	Password: <input type="password" name="passwd"/><br />
	First Name: <input type="text" name="fname" /><br />
	Last Name: <input type="text" name="lname"/><br />
	<input type="submit" name="submit" value="Submit"/>
	</form>
</fieldset>

</body>
</html>