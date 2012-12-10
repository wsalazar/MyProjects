<?php
require_once('config.php');
if(!isset($_SESSION['login']) || $_SESSION['login'] !== true){
	header("Location: login.php");
	exit;
}
?>

<!DOCTYPE>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<a href="adminNav.php"><--Back</a>
<nav>
	<a href="upload.php">upload picture</a>
	<a href="view.php">view my pictures</a>
	<a href="delete.php">delete picture</a>
	<a href="change.php">change picture</a>
	<a href="logoff.php">logoff</a>
</nav>
</body>
</html>