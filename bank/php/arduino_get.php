<?php
include "var.php";

$tempBedrag = $_SESSION["bedrag"];
$briefjes = $_SESSION["bedrag"] . ":" . $_SESSION["bonKeuze"] . ":";


// Check connection database
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    $sql_5 =  "SELECT * FROM opslag WHERE Soort = 5";
    $sql_10 = "SELECT * FROM opslag WHERE Soort = 10";
    $sql_20 = "SELECT * FROM opslag WHERE Soort = 20";
    $sql_50 = "SELECT * FROM opslag WHERE Soort = 50";

    $result_5 = mysqli_query($conn, $sql_5);
    $result_10 = mysqli_query($conn, $sql_10);
    $result_20 = mysqli_query($conn, $sql_20);
    $result_50 = mysqli_query($conn, $sql_50);

    if (mysqli_num_rows($result_5) == 1 && mysqli_num_rows($result_10) == 1 && mysqli_num_rows($result_20) == 1 && mysqli_num_rows($result_50) == 1) {
        $row_5 = mysqli_fetch_assoc($result_5);;
        $row_10 = mysqli_fetch_assoc($result_10);
        $row_20 = mysqli_fetch_assoc($result_20);
        $row_50 = mysqli_fetch_assoc($result_50);

        echo "<br> 5 = " . $row_5["Aantal"];
        echo "<br> 10 = " . $row_10["Aantal"];
        echo "<br> 20 = " . $row_20["Aantal"];
        echo "<br> 50 = " . $row_50["Aantal"] . "<br>";
    } else {
        echo "Error";
    }
}

while ($tempBedrag > 0) {

    if ($tempBedrag - 50 >= 0 && $row_50["Aantal"] > 0) {

        $briefjes = $briefjes . "50,";
        $tempBedrag -= 50;

        $row_50["Aantal"] = $row_50["Aantal"] - 1;

    } else if ($tempBedrag - 20 >= 0 && $row_20["Aantal"] > 0) {
        $briefjes = $briefjes . "20,";
        $tempBedrag -= 20;

        $row_20["Aantal"] = $row_20["Aantal"] - 1;

    } else if ($tempBedrag - 10 >= 0 && $row_10["Aantal"] > 0) {
        $briefjes = $briefjes . "10,";
        $tempBedrag -= 10;

        $row_10["Aantal"] = $row_10["Aantal"] - 1;

    } else if ($tempBedrag - 5 >= 0 && $row_5["Aantal"] > 0) {
        $briefjes = $briefjes . "05,";
        $tempBedrag -= 5;

        $row_5["Aantal"] = $row_5["Aantal"] - 1;

    } else {
        echo "te weinig briefjes";
        break;
    }
}

$briefjes = $briefjes . "..";

echo "<br><br>" . $briefjes;

if ($tempBedrag == 0){
    //database updaten
    $r5 = $row_5["Aantal"];
    $r10 = $row_10["Aantal"];
    $r20 = $row_20["Aantal"];
    $r50 = $row_50["Aantal"];

    $pasnummer = $_SESSION["pasnummer"];
    $Bedrag = $_SESSION["bedrag"];

    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $sql_5_verlagen = "UPDATE opslag SET Aantal = '$r5' WHERE opslag.Soort = '5'";
        mysqli_query($conn, $sql_5_verlagen);

        $sql_10_verlagen = "UPDATE opslag SET Aantal = '$r10' WHERE opslag.Soort = '10'";
        mysqli_query($conn, $sql_10_verlagen);

        $sql_20_verlagen = "UPDATE opslag SET Aantal = '$r20' WHERE opslag.Soort = '20'";
        mysqli_query($conn, $sql_20_verlagen);

        $sql_50_verlagen = "UPDATE opslag SET Aantal = '$r50' WHERE opslag.Soort = '50'";
        mysqli_query($conn, $sql_50_verlagen);

        $sql_rekening_updaten = "UPDATE rekeningen SET Saldo = Saldo - '$Bedrag' WHERE rekeningen.Pasnummer = '$pasnummer'";
        mysqli_query($conn, $sql_rekening_updaten);

        $sql_transactie = "INSERT INTO bij_en_afschriften (Pasnummer, Verandering, Tijdstip) VALUES ('$pasnummer', '$Bedrag', CURRENT_TIMESTAMP)";
        mysqli_query($conn, $sql_transactie);
    }
    header("location: ../html/afsluit.php");
}

echo "<br><br> 5 = " . $row_5["Aantal"];
echo "<br> 10 = " . $row_10["Aantal"];
echo "<br> 20 = " . $row_20["Aantal"];
echo "<br> 50 = " . $row_50["Aantal"] . "<br>";

//stuur naar arduino





//UPDATE opslag SET Aantal = 100 WHERE opslag.Soort = '5';
//UPDATE opslag SET Aantal = 100 WHERE opslag.Soort = '10';
//UPDATE opslag SET Aantal = 100 WHERE opslag.Soort = '20';
//UPDATE opslag SET Aantal = 100 WHERE opslag.Soort = '50';

?>
