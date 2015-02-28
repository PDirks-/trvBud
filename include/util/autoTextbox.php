<?php// textbox autofill

include("../../secure/database.php");	// login information for server

$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD) or die("Failed to connect to the database");
	
$search = htmlspecialchars( $_GET['search'] );	// grab query from 

if( !isnull($search) ){

	$q = "select city from trv.cities where ( city_raw ilike $1 ) limit 100";	// build query
	$result = pg_query($q) or die('Query failed: ' . pg_last_error());
	
	$cities = array();
	
	for( $i=0; $i < 101; $i++){					//cycle through all table results
		$fetch = pg_fetch_row( $result, $i );	// grab individual row
		array_push($cities, $fetch);			// add temp to bigger return array
	}
	
	/*
	 *	Finally return data as json
	 */		

	header('Access-Control-Allow-Origin: *');										// THIS FIXES CORS ISSUE!!!!!
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

	echo json_encode( $cities );							// encode array, return
	
}// end null-check
?>
