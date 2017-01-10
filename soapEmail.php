<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/lib/nusoap.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/lib/class.wsdlcache.php');
	$email = $_GET["eposta"];
	$soapclient = new nusoap_client('http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl',true);
	$result = $soapclient->call('egiaztatuE', array($email));
	if($result=="BAI"){
		echo 'Emaila gelako ikaslearena da.';
	}else{
		echo 'Emaila ez da gelako ikaslearena.';			
	}
?>