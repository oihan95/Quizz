<?php
	$ip = $_SERVER['SERVER_ADDR'];
	$url = "http://ip-api.com/xml/".$ip."?fields=lat,lon";
	$xml = simplexml_load_file($url);
	$lat = $xml -> lat;
	$lon = $xml -> lon;
	echo $lat.','.$lon;
?>