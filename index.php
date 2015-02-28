<!DOCTYPE html>
<html>
<head>
	
	<meta charset=UTF-8>
	<!-- Bootstrap core CSS -->
	<link href="include/bootstrap/css/bootstrap.css" rel="stylesheet">
	<!-- Bootstrap theme -->
	<link href="include/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="include/styles.css">
	<title>trvBud</title>
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
		<button type="button" class="btn btn-default btn-lg" action="create">trvBud</button>
	</div>
	

	<div id="addCities">
		<center>
		<br>
		<div class="input-group">
		  <input type="text" class="form-control" placeholder="Name or Zipcode.." aria-describedby="basic-addon1">
		</div>
		<br>
		<!--Adding a new part-->
		<div class="input-group">
		  <button type="button" class="btn btn-default" action="addCity()">+</button>
		</div>
	</div>

		
	<!-- run scripts at end of page for faster loading -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="include/bootstrap/dist/js/bootstrap.min.js"></script>
 </body>
