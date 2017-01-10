<?php
echo('<br>');
echo('<form enctype="multipart/form-data" name = "insertquestion" id="insertquestion" action="InsertQuestion.php" method="post" class="elegant-aero backgroundred">');
echo('<p>Galderaren testua: </p>');
echo('<p><textarea class="textarea" cols="40" rows="5" id="galdera" name="question"></textarea></p>');
echo('<p>Galderaren erantzun zuzena: </p>');
echo('<p><textarea class="textarea" cols="40" rows="5" id="erantzuna" name="answer"></textarea></p>');
echo('<p>Zailtasun-maila:</p>');
echo('<p><input class="input" type="text" name="level" id="maila" value=""/></p>');
echo('<p><button class="button">Gehitu galdera</button></p>');
echo('</form>');
echo('<br>');
?>