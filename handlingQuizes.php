<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesPWS/tabs.css"/>
        <title>Quizzes - Maneiatu galderak</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="tabs.js"></script>
        <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
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
                        HTML, siglas de HyperText Markup Language («lenguaje de marcado de hipertexto»), hace referencia al lenguaje de marcado predominante para la elaboración de páginas web que se utiliza para describir y traducir la estructura y la información en forma de texto, así como para complementar el texto con objetos tales como imágenes. El HTML se escribe en forma de «etiquetas», rodeadas por corchetes angulares (<,>). HTML también puede describir, hasta un cierto punto, la apariencia de un documento, y puede incluir un script (por ejemplo JavaScript), el cual puede afectar el comportamiento de navegadores web y otros procesadores de HTML.
                    </div>
                    <div id="cpestana2">
                        El nombre hojas de estilo en cascada viene del inglés Cascading Style Sheets, del que toma sus siglas. CSS es un lenguaje usado para definir la presentación de un documento estructurado escrito en HTML o XML2 (y por extensión en XHTML). El W3C (World Wide Web Consortium) es el encargado de formular la especificación de las hojas de estilo que servirán de estándar para los agentes de usuario o navegadores.
                    </div>
                    <div id="cpestana3">
                        JavaScript es un lenguaje de programación interpretado, dialecto del estándar ECMAScript. Se define como orientado a objetos,3 basado en prototipos, imperativo, débilmente tipado y dinámico.
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>