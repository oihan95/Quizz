<?php

//$esteka = mysqli_connect("mysql.hostinger.es", "u421176028_root", "123456",  "mysql_select_db");
$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

$irudi_izena = $_FILES['irudia_ona']['name'];
$dir_image = '/Applications/XAMPP/xamppfiles/htdocs/Quizz/img/irudiak/';
move_uploaded_file($_FILES['irudia_ona']['tmp_name'],$dir_image.$irudi_izena);

if (!$esteka)
{ 	
	echo "Hutsegitea MySQLra konetatzerakoan". PHP_EOL;
	echo "error depurazio akatsa: " . mysqli_connect_error().PHP_EOL;
	exit;
}

$sql = "INSERT INTO Erabiltzaile VALUES
	('$_POST[name]',
	'$_POST[abi1]',
	'$_POST[abi2]',
	'$_POST[mail]',
	'$_POST[pass]',
	'$_POST[telf]',
	'$_POST[spe]',
	'$_POST[specialityOther]',
	'$_POST[interests]',
	'$irudi_izena')";

$ema=mysqli_query($esteka,$sql);

if (!$ema){
	die('Errorea query-a gauzatzerakoan: '.msqli_error());
}

echo "erregistro berri bat gauzatu da";
echo "<p> <a href='ShowUsersWithImage.php'> Erregistroak ikusi </a>";

mysqli_close($esteka);

?>