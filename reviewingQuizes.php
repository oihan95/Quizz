<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: error.html');
        exit();
    }elseif (strcmp($_SESSION['email'], 'web000@ehu.es')!=0) {
        header('Location: error.html');
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Quizzes - Maneiatu galderak</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="ajax.js"></script>
        <script type="text/javascript" src="form.js"></script>
        <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
        <link rel="stylesheet" type="text/css" href="stylesPWS/form.css">
        <link rel="stylesheet" type="text/css" href="stylesPWS/colours.css">
        <link rel="stylesheet" type="text/css" href="stylesPWS/shapes.css">
        <link rel="stylesheet" type="text/css" href="stylesPWS/table.css">
    </head>
    <body onload="galderakkontatu()">
      <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
      <div class = "header">
            <div id="logo">Quiz: crazy questions</div>
                <div class="navbar">
                    <a href="layout.php">Home</a>
                    <a href="quizzes.php">Quizzes</a>
                    <a href="credits.php">Credits</a>
                    <a href="logout.php">Log out</a>
                </div>
        </div>
        <div class="wrapper jump">
        <?php
            $email=$_SESSION['email'];
            $esteka = mysqli_connect("localhost", "root",  "", "Quiz");
            $sql = "SELECT Izena FROM Erabiltzaile WHERE Eposta = '$email'";
            $ema = mysqli_query($esteka,$sql);
            $row = mysqli_fetch_assoc($ema);
            echo "<span>Kaixo </span><span class="."red".">".$row['Izena'].":"."</span>";
            mysqli_close($esteka);
        ?> 
        </div>
        <div class="wrapper center">
        <br>
            <div class="megabox" id="kont">
            <br>
            <br>
            </div>
            <br>
            <div class="megabox">
                <p><input type="button" class="input" value="Ikusi galderak" onclick="ikusiGalderaGuztiak()"/>
                <input type="button" class="input" value="Ikusi erabiltzaileak" onclick="ikusiIkasleak()"/>
                <input type="button" class="input" value="Ikusi XML fitxategiko galderak" onclick="ikusixmlgalderak()"/></p>
                <p><input type="button" class="input" value="Gehitu galdera bat" onclick="gehituformularioa()"/>
                <input type="button" class="input" value="Ikusi XMLko galderak transformatuta" onclick="ikusixslgalderak()"/></p></p>
                <br>
            </div>
            <br>
            <div class="megabox" id="laukia">
            </div>
        </div>  
    </body>
</html>