<?php
    session_start();
    if (isset($_SESSION['email'])) {
    	if (strcmp($_SESSION['email'], 'web000@ehu.es')==0) {
    		header('Location: reviewingQuizes.php');
        	exit();
    	}
        header('Location: handlingQuizes.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Quizzes - Hasiera</title>
    	<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
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
		<div class="wrapper jump center">
			Quizzes and credits will be displayed in this spot in future laboratories ...
		</div>
	</body>
</html>