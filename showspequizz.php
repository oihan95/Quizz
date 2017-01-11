<?php
	session_start();
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
	$email=$_SESSION['email'];

	$ekintza = "INSERT INTO Ekintzak VALUES ('$nEKI','$konex','$email','Galdera ikusi','$data','$ipaddress' )";

	$emaitzaEkintza = mysqli_query($esteka,$ekintza);

	if (!$emaitzaEkintza){ 
		die('Errorea query-a gauzatzerakoan: ' .mysqli_error($link));
	}

	$galdera = "SELECT * FROM Galderak WHERE Zenbakia = '$id'";

	$galderaemaitza = mysqli_query($esteka,$galdera);

	$row=mysqli_fetch_array($galderaemaitza, MYSQLI_ASSOC);

	echo "<br>";
	if (strcmp($email, 'web000@ehu.es')==0) {
		echo '<p>Egilearen eposta: '.$row['Eposta'].'</p>';
		echo "<br>";
		//echo '<p>Gaia: '.$row['Gaia'].'</p>'; xml fitxategiko galderarako
		//echo "<br>";
	}
	echo '<p>Zailtasuna: '.$row['Zailtasuna'].'</p>';
	echo '<br>';
	echo ('<p>Testua: '.$row['Testua'].'</p>');
	echo "<br>";
	if (strcmp($email, 'web000@ehu.es')==0) {
		echo '<p>Erantzuna: '.$row['Erantzuna'].'</p>';
		echo "<br>";
		echo "<input type="."button"." class="."input"." value=".'Editatu'." onclick=".'editatugaldera('.$row['Zenbakia'].')"/>';
		echo "<br>";
		echo "<br>";
	}
	mysqli_close($esteka);
?>