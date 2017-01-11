<?php
	$esteka = mysqli_connect("localhost", "root",  "", "Quiz");

	$ema = mysqli_query($esteka, "SELECT * from Galderak");

	echo "<p>Galdera bat ikusteko egin click zenbakiaren gainean</p>";
	echo('<div class="table">');
	echo('<div class="header-row row">');
	echo('<span class="cell">Zenbakia</span>');
	echo('<span class="cell">Egilearen eposta</span>');
	echo('<span class="cell">Enuntziatua</span>');
	echo('<span class="cell">Erantzuna</span>');
	echo('<span class="cell">Zailtasun-maila</span>');
	echo('<span class="cell">Gaia</span>');
	echo('</div>');

	while( $row=mysqli_fetch_array($ema, MYSQLI_ASSOC)) {
		echo('<div class="row">');
		echo('<span class="cell"> <a class="esteka black" onclick="ikusigaldera('.$row['Zenbakia'].')">'.$row['Zenbakia'].'</a> </span>');
		echo('<span class="cell">'.$row['Eposta'].'</span>');
		echo('<span class="cell">'.$row['Testua'].'</span>');
		echo('<span class="cell">'.$row['Erantzuna'].'</span>');
		if (strcmp($row['Zailtasuna'],'NULL')==0) {
			echo('<span class="cell">NULL</span>');
		}else{
			echo('<span class="cell">'.$row['Zailtasuna'].'</span>');
		}
		echo('</div>');
	}
	echo('</div>');
	mysqli_free_result($ema);
	mysqli_close($esteka);

	//XML fitxategiko galderak ere sartu
?>