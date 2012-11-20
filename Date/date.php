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
	/*
	$yr = substr($date,0,-6);
	$month = substr($date,0,-3);
	$month = substr($month,5);
	$day = substr($date,8);

	$format1 = $yr.'-'.$month.'-'.$day;
	$format2 = $month.'-'.$day.'-'.$yr;
	
	if($date == $format1){
		$year = substr($date,0,4);
	}
	else if ($date==$format2){
		$year = substr($date,-4);
	}
	else{ 
		$msg = "Format is incorrect";
	}
	*/
?>
<!DOCTYPE>
<html>
<head>
<meta>
<title>Date</title>
</head>
<body>
	<?php
	if($msg!='')
		echo $msg;
	?>
<form>

	Date: <input type="text" name="date"><br />
	Year is: <input type="text" readonly="year" name="year" value="<?=$year?>">
	<input type="submit" name="submit" value="Submit">
</form>
</body>
</html
