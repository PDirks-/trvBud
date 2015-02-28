<?php// textbox autofill

include("../../../secure/database.php");	// login information for server

$search = htmlspecialchars( $_GET['search'] );	// grab query from 

if( !isnull($search) ){

	$q = "select * from trv.cities where ( city_raw ilike $1 )";	// build query

}
?>
