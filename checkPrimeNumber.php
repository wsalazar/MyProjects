<?php

class checkPrimeNumber
{	
	function checkPrime($prime)
	{
		if ($prime ==1)
			return false;
		else if ($prime == 2)
			return true;
		else if ($prime % 2 == 0)
			return false;
		
		$sqrt = (int)(sqrt($prime))+1;
		
		for ($num = 3; $num < $sqrt; $num++)
		{
			if ($prime % $num == 0)
				return false;

		}
		return true;
	}
	

	function __construct()
	{			
		$prime = 1;
		$counter = 0;
		while ($counter <= $_POST['prime'])
		{						
			if($this->checkPrime($prime))	
			{
				$counter++;				
				
				$Target = $prime;
				
				if ($counter == $_POST['prime'])
					echo "Prime number ".$_POST['prime']. " is ".$Target. ".<br/>";
			}
			$prime++;			
		}		
	}

	
}

$primeNumber = new checkPrimeNumber();
?>