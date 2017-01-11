<?php
	$post = $_GET["p"];

	$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

	if (!$esteka)
	{ 	
		echo "Hutsegitea MySQLra konetatzerakoan". PHP_EOL;
		echo "error depurazio akatsa: " . mysqli_connect_error().PHP_EOL;
		exit;
	}

	$sql = "SELECT * FROM Erabiltzaile WHERE Eposta = '$post'";

	$ema = mysqli_query($esteka,$sql);

	if (!($ema -> num_rows == 0)) {
		$mail = "Hemen aurki dezakezu esteka zure pasahitza aldatzeko: /Applications/XAMPP/xamppfiles/htdocs/Quizz/changepass.php?posta=".$post;
		$gaia = "Pasahitz aldaketa";
 
		$headers = "From: Oihan Arroyo < oihan8arroyo@gmail.com >\r\n";

		$bool = mail($post,$gaia,$mail,$headers);

		if($bool){
		    echo "<p>Mezua ongi bidali da</p>";
		}else{
		    echo "<p>Arazo bat egon da mezua bidaltzean</p>";
		}
	}else{
		echo"<p>Eposta hau ez da existitzen</p>":
	}
	mysqli_close($link);
?>