<?php
session_id('batbank');
session_start();

$_SESSION["taal"] = "Engels";

header("location: ../index.php");
?>