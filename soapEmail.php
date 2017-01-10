<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/lib/nusoap.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/lib/class.wsdlcache.php');
	$email = $_GET["eposta"];
	$soapclient = new nusoap_client('http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl',true);
	$result = $soapclient->call('egiaztatuE', array($email));
	if($result=="BAI"){
		echo '<p>Emaila gelako ikaslearena da.</p>';
	}else{
		echo '<p>Emaila ez da gelako ikaslearena.</p>';			
	}
?>