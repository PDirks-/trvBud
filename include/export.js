function expt(){
	var counter = 0;
	var output = '{ "places" : [';
	while( $("#city"+counter).hmtl ){
	
		if( count > 0 ){
			output = output.concat(',');
		}
	
		var arrive = '-';
		var leave = '-';
	
		arrive = $("[name=\"city"+counter+"arr\"]").val;
		leave = $("[name=\"city"+counter+"dep\"]").val;
	
		output = output.concat( '{ "city":\"'+ $("#city"+counter).val +	'\", "arrive":\"'+ arrive +'\", "depart":\"'+ leave +'\" }' );
	
	}
	output = output.concat( " ]}" )

	console.dir(output);
}

