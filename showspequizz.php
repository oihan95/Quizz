<?php
	$id=$_GET["q"];

	$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

	$zenbEki = "SELECT MAX(ID) as ekintzan FROM Ekintzak";
	$emaitzaEki = mysqli_query($esteka,$zenbEki);
	$rowEki = mysqli_fetch_assoc($emaitzaEki);
	$nEKI = $rowEki['ekintzan'];
	$nEKI++;

	$data = date('Y-m-d H:i:s', time());
	$ipaddress = '';
	$konex=$_SESSION['Konexioa'];

	$ekintza = "INSERT INTO Ekintzak VALUES ('$nEKI','$konex','$email','Galdera Txertatu','$data','$ipaddress' )";

	$emaitzaEkintza = mysqli_query($esteka,$ekintza);

	if (!$emaitzaEkintza){ 
		die('Errorea query-a gauzatzerakoan: ' .mysqli_error($link));
	}

	$galdera = "SELECT * FROM Galderak WHERE Zenbakia = '$id'";

	$row = mysqli_fetch_assoc($galdera);

	echo '<p>Zailtasuna: '.$row['Zailtasuna'].'</p>';
	echo '<br>';
	echo ('<p>Testua: '.$row['Testua'].'</p>');
?>