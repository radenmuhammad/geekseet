<?php 
class Witch {

	function killVillarge($sequence_of_year=0){
		$fibonaci_numbers = Array();
		$b = 0;	
		while($b <= $sequence_of_year){
			if($b == 0){
				$fibonaci_numbers[]=0;
			}else if($b == 1){
				$fibonaci_numbers[]=1;
			}else{
				$fibonaci_numbers[] = $fibonaci_numbers[count($fibonaci_numbers)-1] + $fibonaci_numbers[count($fibonaci_numbers)-2];
			}
			$b++;
		}
		$total = 0;
		foreach ($fibonaci_numbers as $key => $value) {
			$total += $value;
		}
		return $total;
	}


	function averageNumberOfPeople($AgeofDeath=0,$YearofDeath=0,$AgeofDeath2=0,$YearofDeath2=0){
		$total = 0;
		if(is_array($AgeofDeath)){
			foreach ($AgeofDeath as $key => $value) {
				if($value["YearofDeath"] < 0 || $value["AgeofDeath"] < 0){
					return -1;
				}
				$total += $this->killVillarge($value["YearofDeath"] - $value["AgeofDeath"]);
			}		
			return $total / count ($AgeofDeath);			
		}else if(is_int($AgeofDeath)){
			if($YearofDeath < 0 || $AgeofDeath < 0){
				return -1;
			}
			if($YearofDeath2 < 0 || $AgeofDeath2 < 0){
				return -1;
			}			
			$total += $this->killVillarge($YearofDeath - $AgeofDeath);
			$total += $this->killVillarge($YearofDeath2 - $AgeofDeath2);	
			return $total / 2;		
		}	
	}
}

$witch = new Witch();

//echo $witch->averageNumberOfPeople(10,12,13,17);
//echo $witch->killVillarge(5);
echo $witch->averageNumberOfPeople(Array(
            Array(
				  "AgeofDeath"=>10,
				  "YearofDeath"=>12
			),
			Array(
				  "AgeofDeath"=>13,
				  "YearofDeath"=>17
			)
));



?>

