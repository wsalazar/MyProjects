<?php
if(@$_POST['submit']){
	$file = $_FILES['pic']['name'];
	echo filesize($file);
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
						echo "Sorry you have exceeded the file size limit.<br />Your file is ".filesize($file).'bytes<br />';				
				}
				else{
					$fileMoved=move_uploaded_file($tempName, $uploadPath.$fileNameExt);
					var_dump($fileMoved);
				}
			}
		
			else{
					echo filesize($file);
					$fileMoved=move_uploaded_file($tempName, $dest);
					var_dump($fileMoved);	
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
<a href="adminNav.php"><--Back</a>
<fieldset>
	<legend>Uploading Picture</legend>
	<form action="" method="post" enctype="multipart/form-data">
	Please upload your picture: <input type="file" name="pic"/><br />
	<input type="submit" name="submit" value="Submit"/>
	</form>
</fieldset>
</body>
</html>