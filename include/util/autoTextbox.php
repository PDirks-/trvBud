<?php// textbox autofill

include("../../secure/database.php");	// login information for server

$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD) or die("Failed to connect to the database");
	
$search = htmlspecialchars( $_GET['search'] );	// grab query from 
$search = htmlspecialchars( $search.'%');
header("Access-Control-Allow-Origin: *");

if( !isnull($search) ){

	$q = "select city, country, population::integer from trv.cities where ( city_raw ilike 'paris%' ) order by population::integer desc limit 10";	// build query
	$result = pg_query($q) or die('Query failed: ' . pg_last_error());
	
	$cities = array();
	
	for( $i=0; $i < 101; $i++){					//cycle through all table results
		$fetch = pg_fetch_row( $result, $i );	// grab individual row
		array_push($cities, $fetch);			// add temp to bigger return array
	}
	
	
	$titles = array("city", "country");	// titles to be used in key value pairs
	$data = array();				// return array to hold data
	$c = 0;							// counter variable, to be used to track which title to use
	
	for( $i; $i < $numFields; $i++){		//cycle through all table results
		$fetch = array();
		$temp = array();
		$fetch = pg_fetch_row( $result, $i );	// grab individual row
		
		foreach( $fetch as $val ){				// cycle through every entry
			if( !is_null($val) ){
				$temp[$titles[ $c ]] = $val;		// add to new return array
				$c++;
				if( $c > 6 ){						// check and see if title needs to be reset
					$c = 0;
				}
			}	
		}
		echo("wowowow");
		array_push($data, $temp);				// add temp to bigger return array
	}// end for loop
	
	
	/*
	 *	Finally return data as json
	 */		
	 
	header('Content-type: application/json');

	echo json_encode( $cities );							// encode array, return
	
}// end null-check
?>
