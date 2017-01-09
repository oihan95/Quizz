<?php

	session_start();
	if (!isset($_SESSION['email'])) {
		header('Location: layout.html');
		exit();
	}else{
		?>
		<!DOCTYPE html>
		<html>
			<head>
		    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
				<title>Quizzes - Gehitu galdera</title>
		    	<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
		    	<link rel="stylesheet" type="text/css" href="stylesPWS/form.css">
		    	<link rel="stylesheet" type="text/css" href="stylesPWS/colours.css">
		  	</head>
		  	<body>
			  	<div class = "header">
					<div id="logo">Quiz: crazy questions</div>
						<div class="navbar">
							<a href="layout.html">Home</a>
							<a href='#'>Quizzes</a>
							<a href="signup.html">Sign Up</a>
							<a href="signin.html">Sign In</a>
							<a href="credits.html">Credits</a>
							<a href="logout.php">Log out</a>
						</div>
				</div>
				<div class="wrapper jump">
				<?php
				$email=$_SESSION['email'];
				$esteka = mysqli_connect("localhost", "root",  "", "Quiz");
				$sql = "SELECT Izena FROM Erabiltzaile WHERE Eposta = '$email'";
				$ema = mysqli_query($esteka,$sql);
				$row = mysqli_fetch_assoc($ema);
				echo "<span>Kaixo </span><span class="."red".">".$row['Izena'].":"."</span>"
				?>
					
				</div>
				<div class="wrapper center">
				<form enctype="multipart/form-data" name = "insertquestion" id="insertquestion" action="InsertQuestion.php" method="post" class="elegant-aero">
						<p>Egilearen eposta:</p>
						<p><input class="input" type="text" name="mail" id="posta" value=""/></p>
						<p>Galderaren testua: </p>
						<p><textarea class="textarea" cols="40" rows="5" id="interests" name="interests"></textarea></p>
						<p>Galderaren erantzun zuzena: </p>
						<p><textarea class="textarea" cols="40" rows="5" id="interests" name="interests"></textarea></p>
						<p>Zailtasun-maila:</p>
						<p><input class="input" type="text" name="mail" id="posta" value=""/></p>
						<p><button class="button" type="submit">Gorde galdera</button></p>
					</form>
				</div>
			</body>
		</html>
	<?php
	}
?>


