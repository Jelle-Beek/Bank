<?php
$pasnummer= $_POST["pasnummer"];
$pincode = $_POST["pincode"];


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
        $sql = "SELECT Pincode FROM rekeningen WHERE Pasnummer = '$pasnummer' AND Pincode = '$pincode'";

        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        echo "Gebruiker gevonden";
        header("location: ../html/nederlands/menu.php");
    } else {
        echo "Bestaat niet";
    }
}

?>
