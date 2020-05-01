<?php
/*$voornaam = ucfirst($_POST["voornaam"]);
$tussenvoegsel = $_POST["tussenvoegsel"];
$achternaam = ucfirst($_POST["achternaam"]);
$gebroorte_datum = $_POST["geboorte_datum"];
$geslacht = $_POST["geslacht"];
$landcode = $_POST["landcode"];
$nummer = $_POST["nummer"];
$telefoonnummer = $landcode . " " . $nummer;
$emailadres = $_POST["emailadres"];

if (!empty($voornaam) || !empty($tussenvoegsel) || !empty($achternaam) || !empty($gebroorte_datum) || !empty($geslacht) || !empty($telefoonnummer) || !empty($emailadres)) {
    $host = "145.24.222.43/phpmyadmin/";
    $dbUsername = "root";
    $dbPassword = "Bank@Y44n72";
    $dbName = "batbank";

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    //check connection
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        if ($tussenvoegsel == "") {
            $sql = "INSERT INTO gebruiker (GebruikersID, Naam, Tussenvoegsel, Achternaam, Geboorte_datum, Geslacht, Telefoonnummer, Emailadres)
            VALUES ('', '$voornaam', NULL, '$achternaam', '$gebroorte_datum', '$geslacht', '$telefoonnummer', '$emailadres');";

        } else {
            $sql = "INSERT INTO gebruiker (GebruikersID, Naam, Tussenvoegsel, Achternaam, Geboorte_datum, Geslacht, Telefoonnummer, Emailadres)
            VALUES ('', '$voornaam', '$tussenvoegsel', '$achternaam', '$gebroorte_datum', '$geslacht', '$telefoonnummer', '$emailadres');";
        }


        if ($conn->query($sql)) {
            echo "Gebruiker is aangemaakt";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

} else {
    echo "Alle velden moeten ingevuld zijn";
    die();
}

header("location: ../index.html");*/


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
?>