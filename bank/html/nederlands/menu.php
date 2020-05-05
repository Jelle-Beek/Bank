<?php
session_id("batbank");
session_start();
if (ctype_alnum($_SESSION["key"])) {
    switch ($_SESSION["key"]) {
        case '1':
            header("location: saldo.php");
            break;

        case '2':
            header("location: opnemen.php");
            break;

        case '3':

            break;

        case '4':
            header("location: help.php");
            break;

        case 'D':
            header("location: ../../index.php");
            break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>pin invoeren</title>
    <link href="../../CSS/menu.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="buttons">
    <button class="home">
        <a href="../../index.php"><img src="../../Pictures/algemeen/home_button.png"
                                       class="home_button"></a>
        <h3>D</h3>
    </button>
</div>


<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>
        <br>
        <h2>Maak uw keuze: </h2>
        <br><br><br>

        <button class="keuze">
            <a href="saldo.php"><img src="../../Pictures/nederlands/saldo.png"
                                     class="keuze_button"></a>
            <h3>1</h3>
        </button>

        <button class="keuze">
            <a href="opnemen.php"><img src="../../Pictures/nederlands/opnemen.png"
                                       class="keuze_button"></a>
            <h3>2</h3>
        </button>
        <button class="keuze">
            <img src="../../Pictures/nederlands/70_euro.png"
                 class="keuze_button">
            <h3>3</h3>
        </button>

        <button class="keuze">
            <a href="help.php"><img src="../../Pictures/nederlands/Help.png"
                                    class="keuze_button"></a>
            <h3>4</h3>
        </button>
    </section>
</div>
</body>
</html>
