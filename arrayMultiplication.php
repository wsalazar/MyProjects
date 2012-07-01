<?php
$number = array(2,3,5.9,"10","2.5","8.76",7.2,"heading", "What is this?", "Does this work?", 4, 7.98, "word" => "consumer");

function multiplyByTwoFunction($realNumber)
{
	foreach ($realNumber as $numbers)
	{
		if (is_int($numbers))
			echo 2 * $numbers, PHP_EOL;
		else if (is_float($numbers))
			echo 2 * $numbers, PHP_EOL;
		else if (is_numeric($numbers))
		{
			echo 2 * (float)$numbers, PHP_EOL;
		}
	}
}

multiplyByTwoFunction($number);
?>
