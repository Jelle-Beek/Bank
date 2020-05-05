<?php
session_id('batbank');
session_start();

$pasnummer = $_POST["pasnummer"];
$key = $_POST["key"];

$_SESSION["pasnummer"] = $pasnummer;
$_SESSION["key"] = $key;

echo "pasnummer: " . $pasnummer . "<br>";
echo "key: " . $key;

?>

<html>
<head>
    <meta http-equiv="refresh" content="0.5" >
</head>
</html>