<?php
session_id('batbank');
session_start();

$_SESSION["taal"] = "Duits";

header("location: ../index.php");
?>
