<!DOCTYPE html>
<html>
<head>
	
	<meta charset=UTF-8>
	<!-- Bootstrap core CSS -->
	<link href="include/bootstrap/css/bootstrap.css" rel="stylesheet">
	<!-- Bootstrap theme -->
	<link href="include/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<!--<link href="include/ajax.js">-->
	<!--<script src="include/main.js"></script>-->

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
	<script src="include/jquery-1.10.2.js"></script>
	<script src="include/jquery-ui-1.10.4.custom.js"></script>
	<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/base/jquery-ui.css"></script>
	<link rel="stylesheet" type="text/css" href="include/styles.css">
	<!--<script src="include/map.js"></script>-->
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
	<!--<script src="./include/main.js"></script>	-->
	<title>trvBud</title>
	<script>

$( "#test" ).click(function() {
	console.dir("test!");
});


$( "#city-in" ).keydown(function() {
	console.dir("keydown!");
	populate();
});


// function to be called on every key press in the text-box
function populate(){
	var input = $('#city-in').val();
	console.dir(input);
	options = {
		"url": "/include/util/autoTextbox.php",
		"content": "data",
		"format": "json"
	};
	$.get("/include/util/autoTextbox.php?search="+input, options, function(data) {
		processData(data);
	});// end get
}// end populate

function processData( data ){
	console.dir(data);
}// end processData

	</script>
</head>
<body id="body">
	<!--
	<div class="btn-group" role="group" aria-label="...">
		<?php
				session_start();
				if(isset($_SESSION['login_user'])){
						echo "<button type='button' class='btn btn-default'>Profile</button>";
						echo "<button type='button' class='btn btn-default'>Logout</button>";
					} else {
						echo "<button type='button' class='btn btn-default'>Login</button>";
					};
			
		?>
	</div> -->
	<br>
	
	<div id="tit">	
		<button type="button" class="btn btn-default btn-lg" id="show">trvBud</button>
	</div>
	<center>
	<div id="cityOptions">
	</div>
	
	
	<form action="process.php" method="post">
	<div id="addCities">
		<br>
		<div id="map-canvas"></div>
		<br>
		<form action="encode.php" method="post">
		<div class="input-group" id="dopeDiv">
		  <input type="text" name="city0" class="form-control" placeholder="City Name..." aria-describedby="basic-addon1" id="city0">
		</div>
		<br>
		<!--Adding a new part-->
		<div class="input-group">
		  <button type="button" class="btn btn-default" id="add">+</button>
  		  <!--<button type="button" class="btn btn-default" id="test">+</button> -->
		</div>
		<div class="input-group">
		  <button type="submit" class="btn btn-default" id="fin">Submit</button>
  		  <!--<button type="button" class="btn btn-default" id="test">+</button> -->
		</div>
	</form>
	</div>
	</form>

		
	<!-- run scripts at end of page for faster loading -->
	
	<script>
/*$('#city-in').bind("keydown", function() {
	console.dir("boop");
	populate();
});*/

$( "#city-in" ).keypress(function(event) {
//	console.dir("keydown!");
	populate();
});

// function to be called on every key press in the text-box
function populate(){
	var input = $('#city-in').val();
	console.dir(input);
	options = {
		"content": "data",
		"dataType": 'jsonp',
		"format": "json"
	};
	$.get("/~rcsc77/trvBud/trvBud/include/util/autoTextbox.php?search="+input, options, function(data) {
		processData(data);
	});// end get
}// end populate

function processData( data ){
	console.dir("getting...");
	console.dir(data);
}// end processData


//Starting Map stuff


var map;

$(document).ready(function(){
	function initialize() {
	  var mapOptions = {
	    zoom: 2,
	    center: new google.maps.LatLng(0, 0)
	  };
	  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
	}

	google.maps.event.addDomListener(window, 'load', initialize);
	$("#map-canvas").hide();
});


var counter = 1;
var city;
var cities = new Array();

$("#show").click(function(){
        $("#map-canvas").show();
	google.maps.event.trigger(map, 'resize');
	
/*for(var i=0;i<counter;i++){
		$("#cityOptions").append('<br><div class="input-group">'+
						'<span class="input-group-addon" id="basic-addon1">city'+i+'</span>'+
						'<input type="text" class="form-control" placeholder="Arrive Date" aria-describedby="basic-addon1">'+
						'<input type="text" class="form-control" placeholder="Departure Date" aria-describedby="basic-addon1"></div><br>');
	};*/
	
});


$("#add").click(function(){
	$("#dopeDiv").append('<br><br><div class="input-group">'+
						'<input type="text" name="city'+(counter-1)+'arr"class="form-control dates" placeholder="Arrive Date" aria-describedby="basic-addon1">'+
						'<span class="input-group-addon"></span>'+

						'<input type="text" name="city'+(counter-1)+'dep" class="form-control dates" placeholder="Departure Date" aria-describedby="basic-addon1"></div><br>');
	$("#dopeDiv").append('<br><br>');
	$("#dopeDiv").append('<input type="text" name="city'+counter+'" class="form-control" placeholder="City Name..." aria-describedby="basic-addon1" id="city'+counter+'">');
	counter++;
	console.dir(counter);
	cities[counter]=counter;
	$(".dates").datepicker();
	<?php echo $_POST["city0"]; ?>
});
	</script>
    <script src="include/bootstrap/js/bootstrap.min.js"></script>	 
</body>
