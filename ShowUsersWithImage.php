<?php

//$esteka = mysqli_connect("mysql.hostinger.es", "u421176028_root", "123456",  "mysql_select_db");
$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

$ema = mysqli_query($esteka, "select * from Erabiltzaile");

?>

<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Quizzes - Erabiltzaileak</title>
    	<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
    	<link rel="stylesheet" type="text/css" href="stylesPWS/table.css">
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
				</div>
		</div>
		<div class="wrapper jump center">

			<?php
				echo('<div class="table">');
				echo('<div class="header-row row">');
				echo('<span class="cell"></span>');
				echo('<span class="cell">Izena</span>');
				echo('<span class="cell">Lehenengo abizena</span>');
				echo('<span class="cell">Bigarren abizena</span>');
				echo('<span class="cell">Eposta</span>');
				echo('<span class="cell">Espezialitatea</span>');
				echo('</div>');

			while( $row=mysqli_fetch_array($ema, MYSQLI_ASSOC)) {
				echo('<div class="row">');
					echo('<span class="cell">'."<img src='img/irudiak/".$row['Argazkia']."'"." width="."150".">".'</span>');
					echo('<span class="cell">'.$row['Izena'].'</span>');
				    echo('<span class="cell">'.$row['Abizena1'].'</span>');
				    echo('<span class="cell">'.$row['Abizena2'].'</span>');
					echo('<span class="cell">'.$row['Eposta'].'</span>');
					echo('<span class="cell">'.$row['Espezialitatea'].'</span>');
					echo('</div>');
					}
			echo('</div>');

			mysqli_free_result($ema);
			mysqli_close($esteka);

			?>

		</div>
	</body>
</html>