<?php
	$id=$_GET["key"];

	$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

	$lortugaldera = "SELECT * FROM Galderak WHERE Zenbakia = $id";

	$galdera = mysqli_query($esteka,$lortugaldera);

	$zenbEki = "SELECT MAX(ID) as ekintzan FROM Ekintzak";
	$emaitzaEki = mysqli_query($esteka,$zenbEki);
	$rowEki = mysqli_fetch_assoc($emaitzaEki);
	$nEKI = $rowEki['ekintzan'];
	$nEKI++;

	$data = date('Y-m-d H:i:s', time());
	$ipaddress = '';
	$konex=$_SESSION['Konexioa'];
	$email=$_SESSION['email'];

	$ekintza = "INSERT INTO Ekintzak VALUES ('$nEKI','$konex','$email','Galdera Ikusi','$data','$ipaddress' )";

	$emaitzaEkintza = mysqli_query($esteka,$ekintza);

	if (!$emaitzaEkintza){
		die('Errorea query-a gauzatzerakoan: ' .mysqli_error($link));
	}

	$row = mysqli_fetch_assoc($galdera);

	echo "<div>";
	echo "<p>Zailtasun-maila: ".$row['Zailtasuna']."</p>";
	echo "<br>";
	echo "<p>Testua: ".$row['Testua']."</p>";
	echo "</div>";
	mysqli_close($esteka);
?>