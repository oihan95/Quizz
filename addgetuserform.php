<?php
echo'<br>';
echo'<h4>Sartu ikaslearen eposta, bere informazioa ikusi ahal izateko</h4>';
echo'<OBJECT id="datuak" data="erabiltzaileak.xml" type="text/xml" style="display:none"></OBJECT>';
echo'<form name = "erregistro" id="erregistro" class="elegant-aero">';
echo'<p>Eposta:</p>';
echo'<p><input class="input" type="text" name="mail" id="korreoa" value=""/></p>';
echo'<p>Izena:</p>';
echo'<p><input class="input" type="text" name="name" id="izena" value=""/></p>';
echo'<p>Abizenak:</p>';
echo'<p><input class="input" type="text" name="surnames" id="abizenak" value=""/></p>';
echo'<p>Telefono zenbakia:</p>';
echo'<p><input class="input" type="text" name="phonenumber" id="telefonozenbakia" value=""/></p>';
echo'<p><input type="button" class="input" value="Osatu" onclick="osatu()"></input></p>';
echo'</form>';
?>