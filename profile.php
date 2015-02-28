<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<meta charset=UTF-8>
	<title>twitStat - Profile</title>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
</head>
<body>
	<center>
	<?php
		session_start();
		//if user is not logged in, redirect to index
		if(!isset($_SESSION['login_user'])){
			header("location: login.php");
		}
		//construct user's profile
		$user = $_SESSION['login_user'];
		//welcome message
		echo "<h1>Welcome $user!</h1>";
		//connect to database and get info of user
		include("../../secure/database.php");
?>
	</br>
	<div class = "cont">
	<input id = "logout" class='btn' type="button" name = "logout" value ="Logout"></input>
	</div>
	<script>
		document.getElementById("logout").onclick = function () {
		location.href = "logout.php";
		};
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="include/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
