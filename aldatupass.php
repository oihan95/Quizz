<?php
    session_start();
    $email = $_SESSION['email']
    $password = $_GET['p'];
    
    $pass = sha1($password);
 
    $esteka = mysqli_connect("localhost", "root",  "", "Quiz");

    $sql = "UPDATE Erabiltzaile SET Pasahitza='$pass' WHERE Email = '$email'";

    $ema = mysqli_query($esteka,$sql);

    $ipaddress = 'UNKNOWN';
    $data = date('Y-m-d H:i:s', time());
    $n = 0;
    $sqlberria = "UPDATE Login SET Kontagailua = '$n' WHERE IP= '$ipaddress' AND Email = '$eposta' AND Eguna = '$eguna'";
    mysqli_query($esteka,$sqlberria);

    mysqli_close($link);

    session_destroy();

    header('Location: layout.php');
  }
?>