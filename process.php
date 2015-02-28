<?php
	$size = (int) $_SERVER['CONTENT_LENGTH'];

	$i=0;
	$data = array();	
	$city = array();
	$arr = array();
	$d	ep = array();
	$size = 2;	

	while($i<$size){
		$tempCity = "city".$i;
		$tempArr = "city".$i."arr";
		$tempDep = "city".$i."dep";
		$data[$city[$i]] = $_POST[$tempCity];
		$data[$arr[$i]] = $_POST[$tempArr];
		$data[$dep[$i]] = $_POST[$tempDep];
	}

	echo $data;

	json_encode($data);
	
	echo $data;


?>
