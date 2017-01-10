<?php
		
	require_once($_SERVER['DOCUMENT_ROOT'].'/Quizz/lib/nusoap.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Quizz/lib/class.wsdlcache.php');

	$pass = $_GET["pass"];
	$soapclient = new nusoap_client('/Applications/XAMPP/xamppfiles/htdocs/Quizz/egiaztatuPasahitzaLokala.php',FALSE);
	$result = $soapclient->call('pasahitzaE', array('pass'=>$pass));
	if(strcmp($result, "BALIOZKOA")==0){
		echo '<p>Pasahitza egokia da.</p>';
	}elseif (strcmp($result, "BALIOGABEA")==0) {
		echo '<p>Pasahitza oso ahula da, sartu beste bat mesedez.</p>';
	}else{
		echo '<p>Zerbait gaizki joan da</p>';		
	}
	
?>