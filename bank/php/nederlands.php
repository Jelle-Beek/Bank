<?php
session_id('batbank');
session_start();

$_SESSION["taal"] = "Nederlands";

header("location: ../index.php");
?>