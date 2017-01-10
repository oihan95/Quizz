<?php
		
	require_once($_SERVER['DOCUMENT_ROOT'].'Quizz/lib/nusoap.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'Quizz/lib/class.wsdlcache.php');
	$pass = $_GET["pass"];
	$soapclient = new nusoap_client('Quizz/egiaztatuPasahitzaLokala.php',false);
	$result = $soapclient->call('pasahitzaE', array('pass'=>$pass));
	if($result=="BALIOZKOA"){
		echo '<p>Pasahitza egokia da.</p>';
	}
	else{
		echo '<p>Pasahitza oso ahula da, sartu beste bat mesedez.</p>';			
	}
	
?>