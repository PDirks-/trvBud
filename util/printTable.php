function printTable($q){					// print table function
	result = pg_query($q) or die('Query failed: ' . pg_last_error());
	// Printing results in HTML 
	echo "<hr><br>\n";
	echo "There were <i>", pg_num_rows($result), "</i> rows returned<br><br>\n\n";
	echo '<table border ="1">'; 
	echo"<tr>";
	$i = pg_num_fields($result);
	for ($j = 0; $j < $i; $j++) {
		$fieldname = pg_field_name($result, $j);
		echo "<td><b><center> $fieldname </center></b></td\n>";
	}
	echo "</tr>";
		echo "<tr>";
	for($i=0;$i<$col;$i++){
		$colname = pg_field_name($query, $i);
		echo"<td> $colname </td>\n";
	}
	echo "</tr>";
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) { 
		echo "\t<tr>\n"; 
		foreach ($line as $col_value) { 
			echo "\t\t<td>$col_value</td>\n";
		} 
		echo "\t</tr>\n";
	} 
	echo "</table>\n";

	pg_free_result($result);				// free queried results
}
