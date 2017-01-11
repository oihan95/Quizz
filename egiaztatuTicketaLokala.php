<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/Quizz/lib/nusoap.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Quizz/lib/class.wsdlcache.php');

	$server = new soap_server;
	$ns=$_SERVER['DOCUMENT_ROOT']."/Quizz";
	$server->configureWSDL('ticketE',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;

	$server->register('ticketE',
	array('ticket'=>'xsd:string'),
	array('emaitza'=>'xsd:string'),
	$ns);

	function ticketE($ticket){
			$myfile = fopen($_SERVER['DOCUMENT_ROOT']."/Quizz/ticket.txt", "r");
			
			if ($myfile){
				while (($ler = fgets($myfile)) !== false){
					$ler = rtrim($ler, "\r\n");
					if(strcmp($ler,$ticket)==0){
						fclose($myfile);
						return "BALIOZKOA";
					}
				}
			}
			fclose($myfile);
			return "BALIOGABE";
			
		}

	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>