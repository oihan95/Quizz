<?php

//$esteka = mysqli_connect("mysql.hostinger.es", "u421176028_root", "123456",  "mysql_select_db");
$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

$ema = mysqli_query($esteka, "select * from Erabiltzaile");

echo '<table border=1> <tr> <th> Izena </th>
		<th> Lehenengo abizena </th>
		<th> Bigarren abizena </th>
		<th> Eposta </th>
		<th> Pasahitza </th>	
		<th> Telefono zenbakia </th>
		<th> Espezialitatea </th>
		<th> Espe_beste </th>
		<th> Interesak </th>
		<th> Argazkia </th>
		</tr>';

while( $row=mysqli_fetch_array($ema, MYSQLI_ASSOC)) {
	echo '<tr> <td>'.$row['Izena'].'</td> <td>'.$row['Abizena1'].'</td> <td>'.$row['Abizena2'].'</td> <td>'.$row['Eposta'].'</td> <td>'.$row['Pasahitza'].'</td> <td>'.$row['Telefono zenbakia'].'</td> <td>'.$row['Espezialitatea'].'</td> <td>'.$row['Espe_beste'].'</td> <td>'.$row['Interesak'].'</td> <td>'.$row['Argazkia'].'</td> </tr>';
		}

echo '</table>';
mysqli_free_result($ema);
mysqli_close($esteka);

?>