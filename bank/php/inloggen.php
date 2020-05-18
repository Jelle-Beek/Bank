<?php
include "var.php";

$pasnummer= $_SESSION['pasnummer'];
$pincode  = $_SESSION["pin"];

$_SESSION["error"] = NULL;

// Check connection
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
        $sql = "SELECT Pincode FROM rekeningen WHERE Pasnummer = '$pasnummer' AND Pincode = '$pincode'";

        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        echo "Gebruiker gevonden";
        header("location: ../html/menu.php");
    } else {

        switch ($_SESSION["taal"]) {
            case "Nederlands":
                $_SESSION["error"] = "Verkeerde pincode";
                break;
            case "Engels":
                $_SESSION["error"] = "Wrong PIN";
                break;
            case "Duits":
                $_SESSION["error"] = "Falsche PIN";
                break;
        }
        $_SESSION["pin"] = NULL;
        header("location: ../html/pin_invoeren.php");
    }
}

?>
