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
		
		
		$combo = 0;		

		for($prime = 2; $prime < 10; $prime++)
		{
			$combo = 0;
			//echo $prime. "<br>";
			for($number = 1; $number < 10; $number++)
			{
				//echo $number. "<br>";
				if ($prime % $number == 0)
				{					
					$combo++;
										
					echo $prime ." ".$number." ". $prime%$number. " ".$combo. "<br>";
					if ($combo == 2)
					{
						$bigPrime = $prime;
						//echo $bigPrime;
					}					
				}	
			}
		}
		echo 'The 10th prime number is '.$bigPrime."<br>"; 
		//echo 'The 10001st prime number is '.$bigPrime."<br>"; 
		/*
				if ($prime % 1 == 0 && $prime == $counter)
					if ($counter == 10001)
						
			}				
		}
		*/
	}
	
}

$number = new NaturalNumbers();