<?php
require('config.php');
$error = '';
$success = '';
$username = $_POST['username'];
$pass = $_POST['passwd'];
$fName = $_POST['fname'];
$lName = $_POST['lname'];

//$select = "SELECT * FROM user where fname ="."'$fName'"." and lname ="."'$lName'";
$select = "SELECT * FROM user";
$selectRes = mysql_query($select);
if($selectRow = mysql_fetch_assoc($selectRes)){
	//echo "hello";
	if($selectRow['username'] == $username)
		$error = "This username already exists.";
	else if ($selectRow['fname'] == $fName && $selectRow['lname'] == $lName)
		$error = "You already have an account.";
	else{
		$insert = "INSERT INTO user(fname,lname,username,passwd) VALUES('$fName', '$lName', '$username', '$pass')";
		$insertRes = mysql_query($insert);
	}
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
	<?php
	if($error !== '')
		echo $error;
	?>
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