<?php
	session_start();
	if (!isset($_SESSION['email'])) {
		header('Location: error.html');
		exit();
	}

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

	$ekintza = "INSERT INTO Ekintzak VALUES ('$nEKI','$konex','$email','Galderak Ikusi','$data','$ipaddress' )";

	$emaitzaEkintza = mysqli_query($esteka,$ekintza);

	if (!$emaitzaEkintza){
		die('Errorea query-a gauzatzerakoan: ' .mysqli_error($link));
	}

	$galderakikusi = "SELECT * FROM Galderak WHERE Eposta = '$email'";

	$ema = mysqli_query($esteka, $galderakikusi);

	if ($ema == FALSE) {
		echo "<h4>Ez duzu galderarik!</h4>";
	}else{
		echo('<h4>Egin click tituluaren gainean galdera ikusteko</h4>');
		echo('<div class="table">');
		echo('<div class="header-row row">');
		echo('<span class="cell">Enuntziatua</span>');
		echo('<span class="cell">Zailtasun-maila</span>');
		echo('</div>');

		while( $row=mysqli_fetch_array($ema, MYSQLI_ASSOC)) {
			echo('<div class="row">');
			echo('<span class="cell"> <a class="esteka black" onclick="ikusigaldera('.$row['Zenbakia'].')">'.$row['Testua'].'</a> </span>');
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
	}
?>