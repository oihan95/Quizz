<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Quizzes - Galderak</title>
    	<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
    	<link rel="stylesheet" type="text/css" href="stylesPWS/table.css">
    	<link rel="stylesheet" type="text/css" href="stylesPWS/shapes.css">
    	<script type="text/javascript" src="ajax.js"></script>
  	</head>
  	<body>
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
		<div class="wrapper jump center">
			<h4>Hauek dira Quizzes-en dauden galdera guztiak</h4>
			<br>
			<h5>Galdera bat ikusi nahi baduzu egin click enuntziatuaren gainean</h5>
			<br>
			<div id=laukia class="megabox">
				<?php
				$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

				$ema = mysqli_query($esteka, "SELECT * from Galderak");

				echo('<div class="table">');
				echo('<div class="header-row row">');
				echo('<span class="cell">Enuntziatua</span>');
				echo('<span class="cell">Zailtasun-maila</span>');
				echo('</div>');

				while( $row=mysqli_fetch_array($ema, MYSQLI_ASSOC)) {
					echo('<div class="row">');
					echo('<span class="cell"><a class="esteka black" onclick="ikusigaldera('.$row['Zenbakia'].')">'.$row['Testua'].'</a></span>');
					if (strcmp($row['Zailtasuna'],'NULL')==0) {
						echo('<span class="cell">NULL</span>');
					}else{
						echo('<span class="cell">'.$row['Zailtasuna'].'</span>');
					}
					echo('</div>');
				}
				echo('</div>');
				mysqli_free_result($ema);
				mysqli_close($esteka);
				?>
			</div>
		</div>
	</body>
</html>

