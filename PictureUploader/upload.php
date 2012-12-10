<?php
require_once('config.php');
session_start();
$id = $_SESSION['id'];
if(@$_POST['submit']){
	$file = $_FILES['pic']['name'];
	//$fileSize = filesize($file);
	//echo $fileSize;
	$success = '';
	$image = array();
	$uploadPath = 'pictures/';
	$tempName = $_FILES['pic']['tmp_name'];
	$dest = $uploadPath.basename($file);
	if (!is_writable($uploadPath))
		die('This file can not be used. You do not have sufficient privileges');
	else{//this is so that only pictures get uploaded.
		if(strpos($dest,'.jpg')=== false && strpos($dest,'.jpeg')=== false && 
			strpos($dest,'.gif')=== false && strpos($dest,'.png')=== false && 
			strpos($dest,'.bmp')=== false && strpos($dest,'.JPG') ===false){
			echo "Invalid format try again.";
		}
		else{//I did this because I had a file with the extension all in capital so I thought if I converted it to lower case it would get uploaded.
			if(strpos($dest,'.JPG') || strpos($dest,'.PNG') || strpos($dest,'.GIF')|| strpos($dest,'.BMP')){
				$ext = strtolower(substr($dest,-4));
				$fileNameExt = substr($file,0,-4).$ext;
				//To make sure what is outputting.
				echo $uploadPath.$fileNameExt;
				if ($_FILES['pic']['error'] != 0){
					if($_FILES['pic']['error']==1)
						echo "Sorry you have exceeded the file size limit.<br />Your file is ".filesize($tempName).' bytes<br />';
				}
				else{
					$fileMoved = move_uploaded_file($tempName, $dest);
					$fileSize = filesize($dest);
					$image = getimagesize($dest);
					//echo "Image ".basename($dest)." is width = ".$image[0]."px by height = ".$image[1]."px<br />";
					$insert = "INSERT INTO user_pictures(id, picture_name, picture_size, picture_width, picture_height) values((SELECT id from user where id = $id),'$file', '$fileSize', '$image[0]','$image[1]')";
					//echo $insert;
					$res = mysql_query($insert);
					if($res)
						$success = "Your image was successfully uploaded.";
					else
						$error = "Your image was not uploaded.";
				}
			}
			else{
					$fileMoved = move_uploaded_file($tempName, $dest);
					$fileSize = filesize($dest);
					$image = getimagesize($dest);					
					//echo "Image ".basename($dest)." is width = ".$image[0]."px by height = ".$image[1]."px<br />";
					$insert = "INSERT INTO user_pictures(id, picture_name, picture_size, picture_width, picture_height) values((SELECT id from user where id = $id),'$file', '$fileSize', '$image[0]','$image[1]')";
					//echo $insert;
					$res = mysql_query($insert);
					if($res)
						$success = "Your image was successfully uploaded.";
					else
						$error = "Your image was not uploaded.";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Picture Uploader-Uploading Picture</title>
</head>
<body>
<a href="dashboard.php"><--Back</a>
<fieldset>
	<?php 
	if($success != '')
		echo $success;
	if($error != '')
		echo $error;
	?>
	<legend>Uploading Picture</legend>
	<form action="" method="post" enctype="multipart/form-data">
	Please upload your picture: <input type="file" name="pic"/><br />
	<input type="submit" name="submit" value="Submit"/>
	</form>
</fieldset>
</body>
</html>