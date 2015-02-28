
<?php
/**
 * generate random sample of geo-tweets, return them as json
 */
include("../secure/database.php");
	$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD) or die("Failed to connect to the database");
	/*
	 * First need to generate 50 random geo tweets
	*/
	$q = "select cit.country,cit.city_raw,cit.city,cit.region,city.population,cit.latitude,city.longitude
		     count.countryCode,count.countryName,count.population,count.capital,count.continent,count.areaInSqKm,count.languages
			from trvCities.cities as cit
			inner join trvCities.countries as count
			on cit.country=count.countryName
			where cit.country=$1;";
		session_start();
		$country = htmlspecialchars($_POST['country']);
		pg_prepare($conn, "check", $query);
		$result = pg_execute($conn, "check", array($country));
		$result = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	/*
	 * Now need to throw results into json
	*/ 
	$titles = array("city","country","city_raw","region","city_population","city.latitude","city.longitude",
			"countryCode","countryName","countryPopulation","countryCapital","countryContinent","countryArea","countryLanguages");	// titles to be used in key value pairs
	$data = array();
	$c = 0;							// counter variable, to be used to track whic title to use
	
	//for( $i=0; $i < 500; $i++){		//cycle through all table results
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
		array_push($data, $temp);				// add temp to bigger return array
	//}

	header('Content-type: application/json');
	echo json_encode( $data );							// encode array, return
?>
