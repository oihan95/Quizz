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
	echo "Oso ongi";
	//header('Location: fitxategia.php');
	mysqli_close($esteka);
}else{
	echo "Erabiltzaile okerra!";
}

?>