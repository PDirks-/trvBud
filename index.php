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
	<link rel="stylesheet" type="text/css" href="css/index.css">

	<title>trvBud</title>
</head>

<body>
	<?php include("./util/navbar.php") ?>
	<div class="outer-wrapper container">
		<div class="left-side col-md-3">
			
			<div class="input-form-main" id="input-form-main">
				<div id="cities-add">
				<div id="cities">
						<input id="add-city-text" class="city-row" type="text" name="city0">
						<button id="add-button" class="city-row" type="button">add</button> 
					</div>
					<div id="go">
						<button type="button">GO!</button>
					</div>
				</div>
				<div id="cities-edit">
				</div>
			</div>
		</div>
		<div class="right-side col-md-9">
			<div id="map-canvas"></div>
		</div>
	</div>
	<script src="./js/index.js" type="text/javascript"></script> 
	<script src="./js/maps.js" type="text/javascript"></script> 		
	<script src="include/bootstrap/js/bootstrap.min.js"></script>	 
</body>
