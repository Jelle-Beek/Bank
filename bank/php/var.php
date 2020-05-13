<?php
session_id("batbank");
session_start();

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "batbank";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

switch ($_SESSION["taal"]) {
    case "Nederlands":
        $terug = "Terug:";
        $afbreken = "Afbreken:";
        break;
    case "Engels":
        $terug = "Back:";
        $afbreken = "Abort:";
        break;
    case "Duits":
        $terug = "Zur&uuml;ck:";
        $afbreken = "Abbrechen:";
        break;
}

?>
