<?php

//$esteka = mysqli_connect("mysql.hostinger.es", "u421176028_root", "123456",  "mysql_select_db");
$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

if(filter_var($_POST['mail'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}@ikasle.ehu.[eus|es]/")))== FALSE)
{
	echo("$_POST[mail] ez da email egokia. ");
}else{
	$irudi_izena = $_FILES['irudia_ona']['name'];
	$dir_image = '/Applications/XAMPP/xamppfiles/htdocs/Quizz/img/irudiak/';
	move_uploaded_file($_FILES['irudia_ona']['tmp_name'],$dir_image.$irudi_izena);

	if (!$esteka)
	{ 	
		echo "Hutsegitea MySQLra konetatzerakoan". PHP_EOL;
		echo "error depurazio akatsa: " . mysqli_connect_error().PHP_EOL;
		exit;
	}

	$pass = sha1($_POST['pass']);

	$sql = "INSERT INTO Erabiltzaile VALUES
		('$_POST[name]',
		'$_POST[abi1]',
		'$_POST[abi2]',
		'$_POST[mail]',
		'$pass',
		'$_POST[telf]',
		'$_POST[spe]',
		'$_POST[specialityOther]',
		'$_POST[interests]',
		'$irudi_izena',
		'0')";

	$ema=mysqli_query($esteka,$sql);

	if (!$ema){
		die('Errorea query-a gauzatzerakoan: '.msqli_error());
	}

	header('Location: correct.html');

	mysqli_close($esteka);
}
?>