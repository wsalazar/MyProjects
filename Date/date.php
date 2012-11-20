<?php
	$date = $_REQUEST['date'];
	$msg = '';
	$yr = explode('-',$date);
	if(strlen($yr[0])== 4){
		$year = $yr[0];
	}
	else if (strlen($yr[2])==4){
		$year = $yr[2];		
	}	
?>
<!DOCTYPE>
<html>
<head>
<meta>
<title>Date</title>
</head>
<body>	
<form>

	Date: <input type="text" name="date"><br />
	Year is: <input type="text" readonly="year" name="year" value="<?=$year?>">
	<input type="submit" name="submit" value="Submit">
</form>
</body>
</html
