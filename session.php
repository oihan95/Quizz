<?php
	session_start();
    if (!isset($_SESSION['email'])) {
		echo "<span>Kaixo </span><span class="."red"."> anonimo:"."</span>";
	}else{
		$email = $_SESSION['email'];
		$esteka = mysqli_connect("localhost", "root",  "", "Quiz");
        $sql = "SELECT Izena FROM Erabiltzaile WHERE Eposta = '$email'";
        $ema = mysqli_query($esteka,$sql);
        $row = mysqli_fetch_assoc($ema);
        echo "<span>Kaixo </span><span class="."red".">".$row['Izena'].":"."</span>";
        mysqli_close($esteka);
	}
?>