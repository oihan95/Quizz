<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/Quizz/lib/nusoap.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Quizz/lib/class.wsdlcache.php');

	$server = new soap_server;
	$ns = $_SERVER['DOCUMENT_ROOT']."/Quizz";
	$server->configureWSDL('pasahitzaE',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;

	$server->register('pasahitzaE', array('pass'=>'xsd:string'), array('emaitza'=>'xsd:string'), $ns);

	function pasahitzaE($pass){
		$myfile = fopen($_SERVER['DOCUMENT_ROOT']."/Quizz/toppasswords.txt", "r");
		
		if ($myfile){
			while (($ler = fgets($myfile)) !== false){
				$ler = rtrim($ler, "\r\n");
				if(strcmp($ler,$pass)==0){
					fclose($myfile);
					return "BALIOGABEA";
				}
			}
		}
		fclose($myfile);
		return "BALIOZKOA";
		
	}

	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>