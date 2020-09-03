<?php 
class Witch {

	function killVillarge($sequence_of_year=0){
		$fibonaci_numbers = Array();
		$a = 0;	
		$total = 0;		
		while($a <= $sequence_of_year){
			if($a < 2){
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
		foreach ($averageNumberOfPeople as $k => $v) {
			if($v["YearOfDeath"] < 0 || $v["AgeOfDeath"] < 0){
				return -1;
			}
			$total += $this->killVillarge($v["YearOfDeath"] - $v["AgeOfDeath"]);
		}		
		return $total / count ($averageNumberOfPeople);			
	}

}

$witch = new Witch();

echo "On the 5th year she kills ".$witch->killVillarge(5)."<br>";
echo "Average Number Of People From Age Of Death = 10, Year Of Death = 12 And Age Of Death = 13, Year Of Death = 17 is ".$witch->averageNumberOfPeople(Array(
    Array(
		"AgeOfDeath" => 10,
		"YearOfDeath" => 12
	),
	Array(
		"AgeOfDeath" => 13,
		"YearOfDeath" => 17
	)
))."<br>";

?>

