<?php
class NaturalNumbers
{
	
	public function __construct()
	{
		$sum = 0;
		for($i = 1; $i < 1000; $i++)
		{
			if ($i % 3 == 0 || $i % 5 == 0)
				$sum+=$i;
		}
		echo 'The sum of all the natural numbers below 1000 that are multiples of 3 or 5 are: '.$sum."<br>";
		
		$sum = 0;
		for($i = 1; $i < 10; $i++)
		{
			if ($i % 3 == 0 || $i % 5 == 0)
				$sum+=$i;			
		}


		
		echo "The sum of all the natural numbers below 10 that are multiples of 3 or 5 are: ".$sum."<br>"."<br>";
	
	}
	
}
	$number = new NaturalNumbers();