<?php

$post = $_GET["e"];
$pass = $_GET["p"];

if ((strcmp($post, '')==0)||strcmp($post, ' ')==0) {
	echo "<br>";
	echo "<p>Eposta ezin da hutsik egon</p>";
	echo "<br>";
}elseif((strcmp($pass, '')==0)||strcmp($pass, ' ')==0){
	echo "<br>";
	echo "<p>Pasahitza ezin da hutsik egon</p>";
	echo "<br>";
}else{
	$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

	if (!$esteka)
	{ 	
		echo "Hutsegitea MySQLra konetatzerakoan". PHP_EOL;
		echo "error depurazio akatsa: " . mysqli_connect_error().PHP_EOL;
		exit;
	}

	$sql = "SELECT * FROM Erabiltzaile WHERE Eposta = '$post' AND  Pasahitza = '$pass'";

	$ema = mysqli_query($esteka,$sql);

	if (!($ema -> num_rows == 0)) {
		
		
		$maxKonex = "SELECT MAX(ID) AS nKonex FROM Konexioak";
		$emaitzaKonex = mysqli_query($esteka,$maxKonex);	
		$zenb = mysqli_fetch_array($emaitzaKonex);
		$zenbaki = $zenb["nKonex"];
		++$zenbaki;

		$data = date('Y-m-d H:i:s', time());
		$konexiosql = "INSERT INTO Konexioak VALUES ('$zenbaki','$post','$data')";
		$emaitzsqlkonexioa = mysqli_query($esteka,$konexiosql);
		if (!$emaitzsqlkonexioa){
			die('Errorea query-a gauzatzerakoan: ' .mysqli_error($esteka));
		}else{
			session_start(); 
			$_SESSION['email']=$post;
			$_SESSION['Konexioa']=$zenbaki;
			if (strcmp($post, 'web000@ehu.es')==0) {
				echo "reviewingQuizes.php";
			}else{
				echo('handlingQuizes.php');
			}	
		}
	}else{
		mysqli_close($esteka);
		echo "<br>";
		echo "<p>Pasahitza ez da zuzena, mesedez sartu berriro</p>";
		echo "<br>";
	}
}
?>