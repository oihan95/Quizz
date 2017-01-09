<?php

$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

if (!$esteka)
{ 	
	echo "Hutsegitea MySQLra konetatzerakoan". PHP_EOL;
	echo "error depurazio akatsa: " . mysqli_connect_error().PHP_EOL;
	exit;
}

$sql = "SELECT * FROM Erabiltzaile WHERE Eposta = '$_POST[mail]' AND  Pasahitza = '$_POST[pass]'";

$ema = mysqli_query($esteka,$sql);

if (!($ema -> num_rows == 0)) {
	session_start(); 
	$_SESSION['email']=$_POST['mail'];
	header('Location: InsertQuestion.php');
}else{
	mysqli_close($esteka);
	?>
	<!DOCTYPE html>
	<html>
		<head>
	    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
			<title>Quizzes - Sign In</title>
	    	<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	    	<link rel="stylesheet" type="text/css" href="stylesPWS/form.css">
	    	<script type="text/javascript" src="form.js"></script>
	    	<script type="text/javascript">
				window.onload = function(){
					alert("Pasahitz okerra, mesedez saiatu berriro");
				}
			</script>
	  	</head>
	  	<body>
		  	<div class = "header">
				<div id="logo">Quiz: crazy questions</div>
					<div class="navbar">
						<a href="layout.html">Home</a>
						<a href='quizzes.php'>Quizzes</a>
						<a href="signup.html">Sign Up</a>
						<a href="signin.html">Sign In</a>
						<a href="credits.html">Credits</a>
					</div>
			</div>
			<div class="wrapper jump center">
				<form enctype="multipart/form-data" name = "login" id="login" onsubmit="return balidatulogin()" action="signin.php" method="post" class="elegant-aero">
					<p>Eposta:</p>
					<p><input class="input" type="text" name="mail" id="posta" value=""/></p>
					<p>Pasahitza:</p>
					<p><input class="input" type="password" name="pass" id="pasahitza" value=""/></p>
					<p><button class="button" type="submit">Bidali</button></p>
				</form>
			</div>
		</body>
	</html>
	<?php
}
?>