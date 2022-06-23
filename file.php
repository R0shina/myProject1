<?php

// Function to find the difference
// between two dates.
function dateDiffInDays($date1, $date2)
{
   
$date1 = DateTime::createFromFormat('m-d-Y', $date1);
$date2 = DateTime::createFromFormat('m-d-Y', $date2);
//echo $date->format('Y-m-d');
	// Calculating the difference in timestamps
	//$diff = strtotime($date2) - strtotime($date1);
    $diff = $date2->diff($date1);
    return $diff;
	// 1 day = 24 hours
	// 24 * 60 * 60 = 86400 seconds
	//return abs(round($diff / 86400));
}

// Start date
$date1 = "06-22-2022";

// End date
$date2 = "06-30-2022";

// Function call to find date difference
$dateDiff = dateDiffInDays($date1, $date2);

// Display the result
printf("Difference between two dates: "
	. $dateDiff . " Days ");
?>
