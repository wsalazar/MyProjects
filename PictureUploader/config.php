<?php
define('LOCAL_HOST','localhost');
define('USERNAME','root');
define('DB_NAME','picture_upload');
$connect = mysql_connect(LOCAL_HOST,USERNAME);
if(!$connect)
	die('Could not connect to database');
$dbSelected = mysql_select_db(DB_NAME,$connect);
if(!$dbSelected)
	die('Can not connect to database'.mysql_error());
ini_set ("display_errors", "1")
?>

