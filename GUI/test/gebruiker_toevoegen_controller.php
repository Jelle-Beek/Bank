<?php
include "../php/var.php";

$voornaam = ucfirst($_POST["voornaam"]);
$tussenvoegsel = strtolower($_POST["tussenvoegsel"]);
$achternaam = ucfirst($_POST["achternaam"]);
$gebroorte_datum = $_POST["geboorte_datum"];
$geslacht = $_POST["geslacht"];
$landcode = $_POST["landcode"];
$nummer = $_POST["nummer"];
$telefoonnummer = $landcode . " " . $nummer;
$emailadres = $_POST["emailadres"];

//check connection
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    if ($tussenvoegsel == "") {
        $sql = "INSERT INTO gebruiker (GebruikersID, Naam, Tussenvoegsel, Achternaam, Geboorte_datum, Geslacht, Telefoonnummer, Emailadres)
            VALUES (NULL, '$voornaam', NULL, '$achternaam', '$gebroorte_datum', '$geslacht', '$telefoonnummer', '$emailadres');";

    } else {
        $sql = "INSERT INTO gebruiker (GebruikersID, Naam, Tussenvoegsel, Achternaam, Geboorte_datum, Geslacht, Telefoonnummer, Emailadres)
            VALUES ('NULL, '$voornaam', '$tussenvoegsel', '$achternaam', '$gebroorte_datum', '$geslacht', '$telefoonnummer', '$emailadres');";
    }


    if ($conn->query($sql)) {
        echo "Gebruiker is aangemaakt";

        header("location: ../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

/*
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "batbank";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
*/
?>