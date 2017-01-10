<?php

    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: error.html');
        exit();
    }

    $esteka = mysqli_connect("localhost", "root",  "", "Quiz");

    $email=$_SESSION['email'];

    $sqlgalderauser = "SELECT * FROM Galderak where Eposta= '$email'";
    $sqlgalderaall = "SELECT * FROM Galderak";

    $galderakuser = mysqli_query($esteka, $sqlgalderauser);
    $galderakall = mysqli_query($esteka, $sqlgalderaall);

    $nireGalderaKop =mysqli_num_rows($galderakuser);
    $galderaKop =mysqli_num_rows($galderakall);

    echo "<br>";
    echo "<p> ".$email."-en galderak: ".$nireGalderaKop."</p>";
    echo "<p> Erabiltzaile guztien galderak: ".$galderaKop."</p>";
    echo "<br>";

    mysqli_close($esteka);
?>