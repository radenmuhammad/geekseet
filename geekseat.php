<?php 
class Witch {

	function killVillarge($sequence_of_year=0){
		$fibonaci_numbers = Array();
		$b = 0;	
		$total = 0;		
		while($b <= $sequence_of_year){
			if($b <= 1){
				$fibonaci_numbers[]=$b;
				$total += $b;
			}else{
				$total_fibonaci_numbers = $fibonaci_numbers[count($fibonaci_numbers)-1] + $fibonaci_numbers[count($fibonaci_numbers)-2];
				$fibonaci_numbers[] = $total_fibonaci_numbers;
				$total += $total_fibonaci_numbers;
			}
			$b++;
		}
		return $total;
	}

	function averageNumberOfPeople($averageNumberOfPeople=Array()){
		$total = 0;
		foreach ($averageNumberOfPeople as $key => $value) {
			if($value["YearofDeath"] < 0 || $value["AgeofDeath"] < 0){
				return -1;
			}
			$total += $this->killVillarge($value["YearofDeath"] - $value["AgeofDeath"]);
		}		
		return $total / count ($averageNumberOfPeople);			
	}

}

$witch = new Witch();

//echo $witch->killVillarge(5);
echo $witch->averageNumberOfPeople(Array(
    Array(
		"AgeofDeath" => 10,
		"YearofDeath" => 12
	),
	Array(
		"AgeofDeath" => 13,
		"YearofDeath" => 17
	)
));

?>

