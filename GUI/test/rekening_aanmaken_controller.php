<?php
include "../php/var.php";

$voornaam = ucfirst($_POST["voornaam"]);
$tussenvoegsel = strtolower($_POST["tussenvoegsel"]);
$achternaam = ucfirst($_POST["achternaam"]);
$gebroorte_datum = $_POST["geboorte_datum"];
$geslacht = $_POST["geslacht"];
$pasnummer = $_POST["Pasnummer"];
$pincode = password_hash($_POST["Pincode"], PASSWORD_BCRYPT);

if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    if ($tussenvoegsel == "") {
        $sql_gebruiker = "SELECT GebruikersID FROM gebruiker WHERE Naam = '$voornaam' AND Tussenvoegsel IS NULL AND Achternaam = '$achternaam' AND Geboorte_datum = '$gebroorte_datum' AND Geslacht = '$geslacht';";

    } else {
        $sql_gebruiker = "SELECT GebruikersID FROM gebruiker WHERE Naam = '$voornaam' AND Tussenvoegsel = '$tussenvoegsel' AND Achternaam = '$achternaam' AND Geboorte_datum = '$gebroorte_datum' AND Geslacht = '$geslacht';";
    }

    $result = mysqli_query($conn, $sql_gebruiker);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $GebruikersID = $row["GebruikersID"];

        $sql_rekening = "INSERT INTO rekeningen (GebruikersID, Pasnummer, Pincode, Saldo, fout_pogingen) VALUES ('$GebruikersID', '$pasnummer', '$pincode', '0.00', '0');";

        mysqli_query($conn, $sql_rekening);

        echo "rekening aangemaakt!";

    } else {
        echo "Gebruiker niet gevonden!";
    }

    $conn->close();
}
?>