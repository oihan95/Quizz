<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesPWS/tabs.css"/>
        <title>Quizzes - Maneiatu galderak</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="tabs.js"></script>
        <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
        <link rel="stylesheet" type="text/css" href="stylesPWS/form.css">
        <link rel="stylesheet" type="text/css" href="stylesPWS/colours.css">
    </head>
    <body onload="javascript:cambiarPestanna(pestanas,pestana1);">
      <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
      <div class = "header">
            <div id="logo">Quiz: crazy questions</div>
                <div class="navbar">
                    <a href="layout.html">Home</a>
                    <a href='quizzes.php'>Quizzes</a>
                    <a href="signup.html">Sign Up</a>
                    <a href="signin.html">Sign In</a>
                    <a href="credits.html">Credits</a>
                </div>
        </div>
        <div class="wrapper jump center">
            <div class="contenedor">
                <div id="pestanas">
                    <ul id=lista>
                        <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Galderak editatu</a></li>
                        <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>Galderak bistaratu</a></li>
                        <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>Galderak gehitu</a></li>
                    </ul>
                </div>
                
                <div id="contenidopestanas">
                    <div id="cpestana1">
                        HTML, siglas de HyperText Markup Language («lenguaje de marcado de hipertexto»), hace referencia al 
                    </div>
                    <div id="cpestana2">
                        El nombre hojas de estilo en cascada viene del inglés Cascading Style Sheets, del que toma sus siglas. 
                    </div>
                    <div id="cpestana3">
                        <form enctype="multipart/form-data" name = "insertquestion" id="insertquestion" action="InsertQuestion.php" method="post" class="elegant-aero backgroundred">
                            <p>Galderaren testua: </p>
                            <p><textarea class="textarea" cols="40" rows="5" id="galdera" name="question"></textarea></p>
                            <p>Galderaren erantzun zuzena: </p>
                            <p><textarea class="textarea" cols="40" rows="5" id="erantzuna" name="answer"></textarea></p>
                            <p>Zailtasun-maila:</p>
                            <p><input class="input" type="text" name="level" id="maila" value=""/></p>
                            <p><button class="button bluehover" type="submit">Gorde galdera</button></p>
                        </form> 
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>