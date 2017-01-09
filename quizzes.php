<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Quizzes - Galderak</title>
    	<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
    	<link rel="stylesheet" type="text/css" href="stylesPWS/table.css">

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
			<h4>Hauek dira Quizzes-en dauden galdera guztiak</h4>
			<br>
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
				echo('<span class="cell">'.$row['Testua'].'</span>');
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
	</body>
</html>

