<?php
	session_start();
	if (!isset($_SESSION['email'])) {
		header('Location: error.html');
		exit();
	}

	$level = $_GET["level"];
	$galdera = $_GET["question"];
	$erantzuna = $_GET["answer"];

	if ($level > 5 || $level < 1) {
		echo "<br>";
		echo "<p>Zailtasun-maila 1 eta 5 artean egon behar da</p>";
		echo "<br>";
	}else{
		if (empty($galdera)) {
			echo "<br>";
			echo '<p>Galdera ezin da hutsik egon</p>';
			echo "<br>";
		}else{
			if (empty($erantzuna)) {
				echo "<br>";
				echo '<p>Erantzuna ezin da hutsik egon</p>';
				echo "<br>";
			}else{
				$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

				if (!$esteka)
				{ 	
					echo "Hutsegitea MySQLra konetatzerakoan". PHP_EOL;
					echo "error depurazio akatsa: " . mysqli_connect_error().PHP_EOL;
					exit();
				}else{

					//GALDERA ZENBAKI MAXIMOA LORTU

					$zenb = "SELECT MAX(Zenbakia) as n FROM Galderak";
					$emaitza = mysqli_query($esteka,$zenb);
					$row = mysqli_fetch_assoc($emaitza);
					$n = $row['n'];
					$n++;
					
					$email = $_SESSION['email'];

					//DATUAK GORDE

					if (!empty($level)) {
						if(filter_var($level, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[1-5]/")))== FALSE){
							die( "Zailtasun-maila 1 eta 5 artean egon behar da");
						}else{
							$sql = "INSERT INTO Galderak VALUES ('$n','$email','$galdera','$erantzuna','$level')";
						}
					}else{
						$sql = "INSERT INTO Galderak VALUES ('$n','$email','$galdera','$erantzuna','NULL')";
					}

					$ema = mysqli_query($esteka,$sql);

					if ($ema == FALSE){
						echo('Errorea query-a gauzatzerakoan: '.msqli_error());
						exit();
					}else{
						echo'<h3>Galdera ongi gehitu da!</h3>';
					}
					

					//XML atala

					$xml = simplexml_load_file('galderak.xml');
					$assessmentItem = $xml->addChild('assessmentItem');
					$assessmentItem->addAttribute('complexity', $level);
					$assessmentItem->addAttribute('subject', '');
					$itemBody = $assessmentItem->addChild('itemBody');
					$itemBody->addChild('p',$galdera);
					$correctResponse = $assessmentItem->addChild('correctResponse');
					$correctResponse->addChild('value', $erantzuna);
					$errorea = $xml->asXML('galderak.xml');

					//EKINTZA GORDE

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
				}
			}
		}
	}	
?>