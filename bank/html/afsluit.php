<?php
include "../php/var.php";

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

<!DOCTYPE html>
<html>
<head>
    <title>Afsluiten</title>
    <link href="../CSS/saldo.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="10;../index.php">
</head>
<body>

<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>
        <h2>Bedankt voor het pinnen bij Batbank</h2>
        <img src="../Pictures/algemeen/logo.png" alt="Pathman" style="width: 70%">
        <h2 style="color: orangered">U kunt uw pas pakken</h2>

    </section>
</div>
</body>
</html>
