<?php
		
	require_once($_SERVER['DOCUMENT_ROOT'].'/Quizz/lib/nusoap.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Quizz/lib/class.wsdlcache.php');
	
	$ticket = $_GET["ticket"];
	$soapclient = new nusoap_client('egiaztatuTicketaLokala.php',false);
	$result = $soapclient->call('ticketE', array('ticket'=>$ticket));
	if(strcmp($result, "BALIOZKOA")==0){
		echo 'Baimenduna.';
	}elseif (strcmp($result, "BALIOGABEA")==0) {
		echo "Baimen gabeko erabiltzailea";
	}else{
		echo "Zerbait gaizki joan da";
	}
?>