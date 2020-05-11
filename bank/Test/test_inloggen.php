<?php
session_id("batbank");
session_start();

$pasnummer= $_POST['pasnummer'];
$pincode  = $_POST["pincode"];

$_SESSION['pasnummer'] = $pasnummer;
$_SESSION["pin"] = $pincode;

$_SESSION["error"] = "";

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "batbank";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if (mysqli_connect_error()) {
    //connectie slecht
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    //connectie goed
        $sql = "SELECT Pincode FROM rekeningen WHERE Pasnummer = '$pasnummer' AND Pincode = '$pincode'";

        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        echo "Gebruiker gevonden";
        header("location: ../html/menu.php");
    } else {
        $_SESSION["error"] = "Wrong pincode";
        header("location: ../html/pin_invoeren.php");
    }
}

?>
