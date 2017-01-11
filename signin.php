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

	$pasahitza = sha1($pass);

	$fsql="SELECT Blokeatuta AS blok FROM Erabiltzaile WHERE Eposta = '$post'";
	$emblok = mysqli_query($esteka,$fsql);
	$blok=mysqli_fetch_array($emblok);
	$blokeat= $blok['blok'];

	if ($blokeat==1) {
		echo "<br>";
		echo "<p>Erabiltzaile hau blokeatuta dago</p>";
		echo "<br>";
	}else{
		$sql = "SELECT * FROM Erabiltzaile WHERE Eposta = '$post' AND  Pasahitza = '$pasahitza'";

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

				$data = date('Y-m-d', time());
				$zero = 0;
				$sqlLogin = "UPDATE Login SET Kontagailua = '$zero' WHERE Email = '$post' AND Eguna = '$data'";
	        	mysqli_query($esteka,$sqlLogin);

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

			$data = date('Y-m-d', time());
			$sql2="SELECT Kontagailua AS kont FROM Login WHERE Eposta = '$post' AND Eguna = '$data'";
			$em = mysqli_query($esteka,$sql2);

			if($em -> num_rows == 0){
				$kontagailua=1;
				$sql4="INSERT INTO Login VALUES('$post','$kontagailua','$data')";
				mysqli_query($esteka,$sql4);
				mysqli_close($esteka);
			}else{
				$kont =mysqli_fetch_array($em);
				$kontagailua= $kont['kont']; 

				if ($kontagailua >= 3) {
					echo "<br>";
					echo "<p>Saiakera gehiegi, kontua blokeatuta dago</p>";
					if ($kontagailua == 3) {
						$sqlblok="UPDATE Erabiltzaile SET Blokeatuta = 1 WHERE Eposta = '$post'";
						mysqli_query($esteka,$sqlblok);
					}
				}else{
					++$kontagailua;
					$sql5="UPDATE Login SET Kontagailua = '$kontagailua' WHERE Eposta = '$post' AND Eguna = '$data'";
					mysqli_query($esteka,$sql5);
				}
				
			}

			echo "<br>";
			echo "<p>Pasahitza ez da zuzena, mesedez sartu berriro</p>";
			echo "<br>";
			echo '<p><input type="button" class="input" value="Pasahitza ahaztu dut" onclick="pasahitzahaztua()"></input></p>';
			echo "<br>";
		}
	}
}
?>