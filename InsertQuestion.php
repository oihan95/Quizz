<?php

	session_start();
	if (!isset($_SESSION['email'])) {
		header('Location: layout.html');
		exit();
	}
?>

<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Quizzes - Gehitu galdera</title>
    	<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
    	<link rel="stylesheet" type="text/css" href="stylesPWS/form.css">
    	<link rel="stylesheet" type="text/css" href="stylesPWS/colours.css">
  	</head>
  	<body>
	  	<div class = "header">
			<div id="logo">Quiz: crazy questions</div>
				<div class="navbar">
					<a href="layout.html">Home</a>
					<a href='quizzes.php'>Quizzes</a>
					<a href="signup.html">Sign Up</a>
					<a href="signin.html">Sign In</a>
					<a href="credits.html">Credits</a>
					<a href="logout.php">Log out</a>
				</div>
		</div>
		<div class="wrapper jump">
		<?php
		$email=$_SESSION['email'];
		$esteka = mysqli_connect("localhost", "root",  "", "Quiz");
		$sql = "SELECT Izena FROM Erabiltzaile WHERE Eposta = '$email'";
		$ema = mysqli_query($esteka,$sql);
		$row = mysqli_fetch_assoc($ema);
		echo "<span>Kaixo </span><span class="."red".">".$row['Izena'].":"."</span>";
		mysqli_close($esteka);
		?>
			
		</div>
		<div class="wrapper center">
		<form enctype="multipart/form-data" name = "insertquestion" id="insertquestion" action="InsertQuestion.php" method="post" class="elegant-aero">
				<p>Galderaren testua: </p>
				<p><textarea class="textarea" cols="40" rows="5" id="galdera" name="question"></textarea></p>
				<p>Galderaren erantzun zuzena: </p>
				<p><textarea class="textarea" cols="40" rows="5" id="erantzuna" name="answer"></textarea></p>
				<p>Zailtasun-maila:</p>
				<p><input class="input" type="text" name="level" id="maila" value=""/></p>
				<p><button class="button" type="submit">Gorde galdera</button></p>
			</form>
		</div>
	</body>
</html>

<?php


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
			die('Errorea query-a gauzatzerakoan: '.msqli_error());
		}

		//XML atala

		$xml = simplexml_load_file('galderak.xml');
		$assessmentItem = $xml->addChild('assessmentItem');
		$assessmentItem->addAttribute('complexity', $zailtasuna);
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
			echo('<script type="text/javascript">');
			echo('window.onload = function(){');
			echo('alert("Eskerrik asko galdera gehitzeagatik");');
			echo('}');
			echo('</script>');
		}
	}
}
?>