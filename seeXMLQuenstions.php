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
					<a href="layout.php">Home</a>
					<a href='quizzes.php'>Quizzes</a>
					<a href="signup.html">Sign Up</a>
					<a href="signin.html">Sign In</a>
					<a href="credits.html">Credits</a>
				</div>
		</div>
		<div class="wrapper jump center">
			<h4>Hauek dira Quizzes-eko XML fitxategian dauden galdera guztiak</h4>
			<br>
			<?php
				$FILE='galderak.xml';

				if(!file_exists($FILE)){
					echo('<p>Bisita liburua hutsik dago.</p>');
				} elseif (!($fitxategia=simplexml_load_file($FILE))) {
					echo('<p>Errore bat gertatu datu bisita liburua irakurtzean. Barkatu eragozpenak</p>');
				} else {
					echo('<div class="table">');
					echo('<div class="header-row row">');
					echo('<span class="cell">Enuntziatua</span>');
					echo('<span class="cell">Konplexutasuna</span>');
					echo('<span class="cell">Gaia</span>');
					echo('</div>');
					foreach($fitxategia->assessmentItem as $galdera) {
						echo('<div class="row">');
					    echo('<span class="cell">'.$galdera->itemBody.'</span>');
					    echo('<span class="cell">'.$kanta['complexity'].'</span>');
		    			echo('<span class="cell">'.$kanta['subject'].'</span>');
		    			echo('</div>');
					}
					echo('</div>');
				}
			?>
		</div>
	</body>
</html>

