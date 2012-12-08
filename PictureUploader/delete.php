<?php
require_once('config.php');
$error = '';
$success = '';
session_start();
$id = $_SESSION['id'];
$dir = 'pictures/';
$delete = $_GET['delete'];
foreach($delete as $key => $value){
	$deleteRecord = "delete from user_pictures where picture_id = $value";
	$deleteRes = mysql_query($deleteRecord);
/*
	if($deleteRes){
		echo $dir.$images;		
		if(unlink($dir.$images))
					$success = "Image deleted.";
				else
					$error = "There was an error and your images was not deleted.";
	}
	*/
	var_dump($deleteRes);
	if($deleteRes){
		$select1 = "SELECT * from user_pictures where id = $id";
		//echo $select1;
		$selectRes = mysql_query($select1);
		$selectRows = mysql_fetch_assoc($selectRes);
		$directory = opendir($dir);
		if($directory){
			while($images = readdir($directory)){
				//echo $images.'<br />';				
				echo $selectRows['picture_name'];
				if($images == $selectRows['picture_name']){
					echo "Hello 2";
					var_dump(unlink($images));
					$deletedImage = unlink($images);
					var_dump($deletedImage);
					if($deleteImage)
						$success = "Image deleted.";
				}
			}
		}

	}
	else
		$error = "There was an error and your image was not deleted";
	
}
?>
<!DOCTYPE html>
<html>
<head>
	
<title>Picture Uploader-Delete Picture</title>
</head>
<body>
<a href="dashboard.php"><--Back</a><br />
<fieldset>
	<legend>Delete Picture</legend>
<?php
if($success != '')
	echo $success;
if($error != '')
	echo $error;
?>
	<form method="GET">
<?php
$select = "SELECT * from user_pictures where id = $id";
$res = mysql_query($select);
$rows = mysql_fetch_assoc($res);
$dirPics = opendir($dir);
if($dirPics){
	while($images = readdir($dirPics)){
		if($images == $rows['picture_name']){
			//echo $images;		
?>
			<input type="checkbox" name="delete[]" value="<?=$rows['picture_id']?>"><img src="<?=$dir.$images?>" width="200px" height="200px" >
<?php 	
		}
	}
}
closedir($dirPics);
?>
			<input type="submit" name="submit" value="Delete">
	</form>
</fieldset>
</body>
</html>