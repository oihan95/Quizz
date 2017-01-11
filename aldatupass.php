<?php
    session_start();
    $email = $_SESSION['email']
    $password = $_GET['p'];
    
    $pass = sha1($password);
 
    $esteka = mysqli_connect("localhost", "root",  "", "Quiz");

    $sql = "UPDATE Erabiltzaile SET Pasahitza='$pass' WHERE Email = '$email'";
    $sql = "UPDATE Erabiltzaile SET Blokeatuta=0 WHERE Email = '$email'";

    $ema = mysqli_query($esteka,$sql);
    $ema2 = mysqli_query($esteka,$sql2);

    $ipaddress = 'UNKNOWN';
    $data = date('Y-m-d', time());
    $n = 0;
    $sqlberria = "UPDATE Login SET Kontagailua = '$n' WHERE Eposta = '$email' AND Eguna = '$data'";
    mysqli_query($esteka,$sqlberria);

    mysqli_close($link);

    session_destroy();

    header('Location: layout.php');
  }
?>