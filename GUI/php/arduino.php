<?php
include "var.php";

$pasnummer = $_POST["pasnummer"];
$key = $_POST["key"];

$_SESSION["pasnummer"] = $pasnummer;
$_SESSION["key"] = $key;

echo "pasnummer: " . $_SESSION["pasnummer"] . "<br>";
echo "key: " . $_SESSION["key"];


?>

<html>
<head>
    <meta http-equiv="refresh" content="0.5">
</head>
</html>