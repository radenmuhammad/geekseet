<?php 
class Witch {

	function killVillarge($sequence_of_year=0){
		$fibonaci_numbers = Array();
		$a = 0;	
		$total = 0;		
		while($a <= $sequence_of_year){
			if($a <= 1){
				$fibonaci_numbers[] = $a;
				$total += $a;
			}else{
				$fibonaci_numbers[] = $fibonaci_numbers[count($fibonaci_numbers)-1] + $fibonaci_numbers[count($fibonaci_numbers)-2];
				$total += $fibonaci_numbers[count($fibonaci_numbers)-1];
			}
			$a ++;
		}
		return $total;
	}

	function averageNumberOfPeople($averageNumberOfPeople=Array()){
		$total = 0;
		foreach ($averageNumberOfPeople as $key => $value) {
			if($value["YearOfDeath"] < 0 || $value["AgeOfDeath"] < 0){
				return -1;
			}
			$total += $this->killVillarge($value["YearOfDeath"] - $value["AgeOfDeath"]);
		}		
		return $total / count ($averageNumberOfPeople);			
	}

}

$witch = new Witch();

//echo $witch->killVillarge(5);
echo $witch->averageNumberOfPeople(Array(
    Array(
		"AgeOfDeath" => 10,
		"YearOfDeath" => 12
	),
	Array(
		"AgeOfDeath" => 13,
		"YearOfDeath" => 17
	)
));

?>

