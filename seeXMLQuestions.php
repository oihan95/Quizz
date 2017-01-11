<?php
	$FILE='galderak.xml';

	if(!file_exists($FILE)){
		echo('<p>Bisita liburua hutsik dago.</p>');
	} elseif (!($fitxategia=simplexml_load_file($FILE))) {
		echo('<p>Errore bat gertatu datu bisita liburua irakurtzean. Barkatu eragozpenak</p>');
	} else {
		echo('<div class="table">');
		echo('<div class="header-row row">');
		echo('<span class="cell">Enuntziatua</span>');
		echo('<span class="cell">Konplexutasuna</span>');
		echo('<span class="cell">Gaia</span>');
		echo('</div>');
		foreach($fitxategia->assessmentItem as $galdera) {
			echo('<div class="row">');
		    echo('<span class="cell">'.$galdera->itemBody->p.'</span>');
		    echo('<span class="cell">'.$galdera['complexity'].'</span>');
			echo('<span class="cell">'.$galdera['subject'].'</span>');
			echo('</div>');
		}
		echo('</div>');
	}
?>