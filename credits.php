<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Quizzes - Credits</title>
    	<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
    	<link rel="stylesheet" type="text/css" href="stylesPWS/animate.css">
    	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="ajax.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesPWS/colours.css">
        <link rel="stylesheet" type="text/css" href="stylesPWS/shapes.css">
        <script async defer
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuYE4Jcu8yB1hobOMIVZ8rV-LOB8NwW68&callback=initMap">
    	</script>
  	</head>
  	<body onload="showuser(); getserverlocation()">
	  	<div class = "header">
			<div id="logo">Quiz: crazy questions</div>
				<div class="navbar">
					<a href="layout.php">Home</a>
					<a href='quizzes.php'>Quizzes</a>
					<?php
						session_start();
						if (!isset($_SESSION['email'])) {
        					echo "<a href=".'signup.html'.">Sign Up</a>";
							echo "<a href=".'signin.html'.">Sign In</a>";
    					}
					?>
					<a href="credits.php">Credits</a>
					<?php
						if (isset($_SESSION['email'])) {
							echo "<a href=".'logout.php'.">Log out</a>";
    					}
					?>
				</div>
		</div>
		<div class="wrapper jump" id="user">
			
		</div>
		<div class="wrapper center">
			<p>Orrialde hau ondorengo pertsonak garatu du:</p>
			<br>
			<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
				<div class="flipper">
					<div class="front">
						<img src="img/avatarO.png" alt="">
					</div>
					<div class="back grad">
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<h3>Oihan Arroyo</h3>
						<p>Software Ingenieritza</p>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="wrapper center">
			<h3>Zure lokalizazioa</h3>
			<br>
			<div class="maps" id="erab">
			</div>
			<br>
			<h3>Zerbitzariaren lokalizazioa</h3>
			<div class="maps" id="server">
			</div>
		</div>
	</body>
</html>