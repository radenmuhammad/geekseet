<?php 
class Witch {

	function killVillarge($sequence_of_year=0){
		$fibonaci_numbers = Array();
		$a = 0;	
		$total_villagers = 0;		
		while($a <= $sequence_of_year){
			if($a < 2){
				$fibonaci_numbers[] = $a;
				$total_villagers += $a;
			}else{
				$fibonaci_numbers[] = $fibonaci_numbers[count($fibonaci_numbers)-1] + $fibonaci_numbers[count($fibonaci_numbers)-2];
				$total_villagers += $fibonaci_numbers[count($fibonaci_numbers)-1];
			}
			$a ++;
		}
		return $total_villagers;
	}

	function averageNumberOfPeople($averageNumberOfPeople=Array()){
		$total_people_killed = 0;
		foreach ($averageNumberOfPeople as $k => $v) {
			if($v["YearOfDeath"] < 0 || $v["AgeOfDeath"] < 0){
				return -1;
			}
			$total_people_killed += $this->killVillarge($v["YearOfDeath"] - $v["AgeOfDeath"]);
		}		
		return $total_people_killed / count ($averageNumberOfPeople);			
	}

}

$witch = new Witch();

//echo "On the 5th year she kills ".$witch->killVillarge(5)."<br>";
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

