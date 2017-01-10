<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Quizz/lib/nusoap.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Quizz/lib/class.wsdlcache.php');
	$email = $_GET["eposta"];
	$soapclient = new nusoap_client('http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl',true);
	$result = $soapclient->call('egiaztatuE', array($email));
	if($result=="BAI"){
		echo '<p style="color: green">Emaila gelako ikaslearena da.</p>';
	}else{
		echo '<p style="color: red">Emaila ez da gelako ikaslearena.</p>';			
	}
?>