 <?php


function dateDifference($from, $to){
	$date1 = DateTime::createFromFormat('m-d-Y', $from);
	 $date2 = DateTime::createFromFormat('m-d-Y', $to);
	$diff = $date1->diff($date2)->format("%r%a") + 1; 

	 return $diff;
}


//$date1 = "06-21-2022";
//$date2 = "06-23-2022";
//echo (dateDifference($date1, $date2));
