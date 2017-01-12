<?php
	echo('<br>');
	echo('<form enctype="multipart/form-data" name = "mailform" id="mailform" action="" method="post" class="elegant-aero">');
	echo('<p>Sartu hemen zure posta elektronikoa, pasahitze aldatzeko:</p>');
	echo('<p><input class="input" type="text" name="mail" id="mail" value=""/></p>');
	echo('<p><input type="button" value="Gehitu galdera" onclick="bidalimail()"/></p>');
	echo('<br>');
	echo('<div class="errorBox backgroundred" id="bat">');
	echo("</div>");
	echo('</form>');
	echo('<br>');
?>