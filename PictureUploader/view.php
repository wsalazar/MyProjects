<?php
require_once('config.php');
session_start();
$id = $_SESSION['id'];
$dir = 'pictures/';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Picture Uploader-View Picture</title>
</head>
<body>
<a href="dashboard.php"><--Back</a><br />
<?php
$select = "SELECT * from user_pictures where id = $id";
$res = mysql_query($select);
$rows = mysql_fetch_assoc($res);
$dirPics = opendir($dir);
if($dirPics){
	while($images = readdir($dirPics)){
			if($images == $rows['picture_name']){
?>
				<img src="<?=$dir.$images?>" width="<?=$rows['picture_width']?>" height="<?=$rows['picture_height']?>">
<?php 		}
	}
}
?>
</body>
</html>