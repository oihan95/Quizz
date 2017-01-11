<?php
	$post = $_GET["posta"];
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Quizzes - Hasiera</title>
    	<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
    	<link rel="stylesheet" type="text/css" href="stylesPWS/form.css">
    	<script type="text/javascript" src="ajax.js"></script>
    	<link rel="stylesheet" type="text/css" href="stylesPWS/shapes.css">
  	</head>
  	<body>
	  	<div class = "header">
			<div id="logo">Quiz: crazy questions</div>
				<div class="navbar">
					<a href="layout.php">Home</a>
					<a href='quizzes.php'>Quizzes</a>
					<a href="signup.html">Sign Up</a>
					<a href="signin.html">Sign In</a>
					<a href="credits.php">Credits</a>
				</div>
		</div>
		<div class="wrapper jump center" id="laukia">
			<form enctype="multipart/form-data" name = "passform" id="passform" action="" method="post" class="elegant-aero backgroundred">
			<p>Sartu pasahitz berria: </p>
			<p><input class="input" type="text" name="pass" id="pass" value="" onchange="aztertupasahitza(this.value)"/></p>
			<br>
			<div class="errorBox" id="soapPass">
			</div>
			<br>
			<p>Sartu berriro pasahitz berria: </p>
			<p><input class="input" type="text" name="pass2" id="pass2" value=""/></p>
			<p><input type="button" class="input" value="Aldatu" onclick="aldatupass()"></input></p>
			</form>
		</div>
	</body>
</html>