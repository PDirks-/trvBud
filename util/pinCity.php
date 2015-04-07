<?php
session_start();

include("../../secure/database.php");

$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD)		// connect to database, referencing info from secure folder
	or die('Could not connect: ' . pg_last_error());

$q = "select * from trv.cities where (city ilike $1) order by population desc";
$city = htmlspecialchars($_GET['city'].'%');

//$city = $city . %;

pg_prepare($conn, "check", $q);

$result = pg_execute($conn, "check", array($city));

$result = pg_fetch_array($result, null, PGSQL_ASSOC);


//echo $result;

/*
 * Now need to throw results into json
 */ 

//$titles = array("city","country","city_raw","region","city_population","city.latitude","city.longitude",
//		"countryCode","countryName","countryPopulation","countryCapital","countryContinent","countryArea","countryLanguages");	// titles to be used in key value pairs

$titles = array("country", "city_raw", "city", "region", "population", "latitude", "longitude");

$data = array();
$c = 0;							// counter variable, to be used to track whic title to use

$fetch = array();
$temp = array();
$fetch = pg_fetch_row( $result);	// grab individual row
foreach( $fetch as $val ){				// cycle through every entry
	$temp[$titles[ $c ]] = $val;		// add to new return array
	$c++;
	if( $c > 14 ){						// check and see if title needs to be reset
		$c = 0;
	}
}

print_r($temp);
//array_push($data, $temp);				// add temp to bigger return array

header('Content-type: application/json');
echo json_encode( $temp );							// encode array, return


?>
