<?php

	session_start();
	if (!isset($_SESSION['email'])) {
		header('Location: error.html');
		exit();
	}

//Galdera gorde
if (!empty($_POST['question']) && !empty($_POST['answer'])){
	$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

	if (!$esteka)
	{ 	
		echo "Hutsegitea MySQLra konetatzerakoan". PHP_EOL;
		echo "error depurazio akatsa: " . mysqli_connect_error().PHP_EOL;
		exit;
	}else{
		$zenb = "SELECT MAX(Zenbakia) as n FROM Galderak";
		$emaitza = mysqli_query($esteka,$zenb);
		$row = mysqli_fetch_assoc($emaitza);
		$n = $row['n'];
		$n++;

		$email=$_SESSION['email'];

		$galdera = $_POST['question'];
		$erantzuna = $_POST['answer'];
		$level = $_POST['level'];

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

		if (!$ema){
			echo('Errorea query-a gauzatzerakoan: '.msqli_error());
			exit();
		}else{
			echo('<p>Galdera ongi gehitu da</p>');
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

		//Ekintza gorde

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
		}else{
			mysqli_close($esteka);
			echo "<br>";
			echo "<p>Ekintza ongi gorde da</p>";
		}
	}
}else{
	echo('<p>txarto juen da</p>');
}
?>