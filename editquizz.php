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

	$ekintza = "INSERT INTO Ekintzak VALUES ('$nEKI','$konex','$email','Galdera aldatu','$data','$ipaddress' )";

	$emaitzaEkintza = mysqli_query($esteka,$ekintza);

	if (!$emaitzaEkintza){ 
		die('Errorea query-a gauzatzerakoan: ' .mysqli_error($link));
	}

	$galdera = "SELECT * FROM Galderak WHERE Zenbakia = '$id'";

	$galderaemaitza = mysqli_query($esteka,$galdera);

	$row=mysqli_fetch_array($galderaemaitza, MYSQLI_ASSOC);

	echo('<br>');
	echo "Galdera hau ".$row['Eposta']." erabiltzaileak sortu du";
	echo('<br>');
	echo('<br>');
	echo('<form enctype="multipart/form-data" name = "editquestion" id="editquestion" action="" method="post" onsubmit="gordealdaketa()" class="elegant-aero backgroundred">');
	echo('<p>Galderaren testua: </p>');
	echo('<p><textarea class="textarea" cols="40" rows="5" id="galdera" name="question">'.$row['Testua'].'</textarea></p>');
	echo('<p>Galderaren erantzun zuzena: </p>');
	echo('<p><textarea class="textarea" cols="40" rows="5" id="erantzuna" name="answer">'.$row['Erantzuna'].'</textarea></p>');
	echo('<p>Zailtasun-maila:</p>');
	echo('<p><input class="input" type="text" value="'.$row['Zailtasuna'].'" name="level" id="maila" value=""/></p>');
	echo('<p><input type="submit" value="Gorde aldaketak"/></p>');
	echo('</form>');
	echo('<br>');

	mysqli_close($esteka);
?>