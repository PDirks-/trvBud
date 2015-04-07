/*
 * index.js
 */

$(document).ready(function() {
	$("#add-button").click( function(){

		var options = {
			"url": "./index.php",
			"content": "data",
			"format": "json"
		};	

		console.log("<p>" + $("#add-city-text").val() +"</p>");

		var url = "./util/pinCity.php?&city="+$("#add-city-text").val();
		console.log("url: "+url);
		$.get( url, options, function(data){
		//	processData(data);
//			console.log(data);
			console.log("city: ");
			for(i = 0; i < data.length; i++){

				console.log(data.city);
				
			}

		});// end get

		$("#cities-edit").append("<p>" + $("#add-city-text").val() +"</p>");
		$("#add-city-text").val('');
	});
});

function processData(data){}
