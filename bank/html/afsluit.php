<?php
include "../php/var.php";


$_SESSION["pasnummer"] = NULL;

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
        <h2><?php echo $tekst ?></h2>
        <img src="../Pictures/algemeen/logo.png" style="width: 70%">
        <h2 style="color: orangered"><?php echo $tekst2 ?></h2>
    </section>
</div>
</body>
</html>
