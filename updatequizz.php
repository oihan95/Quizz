<?php
	session_start();
	$q=$_GET["q"];
	$a=$_GET["a"];
	$l=$_GET["l"];
	$id=$_GET["id"];

	if ($l > 5 || $l < 1) {
		echo "<br>";
		echo "<p>Zailtasun-maila 1 eta 5 artean egon behar da</p>";
		echo "<br>";
	}else{
		if (empty($q)) {
			echo "<br>";
			echo '<p>Galdera ezin da hutsik egon</p>';
			echo "<br>";
		}else{
			if (empty($a)) {
				echo "<br>";
				echo '<p>Erantzuna ezin da hutsik egon</p>';
				echo "<br>";
			}else{
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

				$ekintza = "INSERT INTO Ekintzak VALUES ('$nEKI','$konex','$email','Galdera eguneratu','$data','$ipaddress')";

				$emaitzaEkintza = mysqli_query($esteka,$ekintza);

				if (!$emaitzaEkintza){ 
					die('Errorea query-a gauzatzerakoan: ' .mysqli_error($link));
				}

				$ud = "UPDATE Galderak SET Testua = '$q', Erantzuna = '$a', Zailtasuna = '$l' WHERE Zenbakia='$id'";

				$galderaemaitza = mysqli_query($esteka,$ud);

				echo('<br>');
				echo "<p>Galdera eguneratuta!</p>";
				echo('<br>');

				mysqli_close($esteka);
			}
		}
	}	
?>