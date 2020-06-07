<?php
include "../php/var.php";

if (ctype_alnum($_SESSION["key"])) {
    switch ($_SESSION["key"]) {
        case '1':
            header("location: ../php/saldo_opvragen.php");
            break;

        case '2':
            $_SESSION["key"] = NULL;
            header("location: opnemen.php");
            break;

        case '3':
            $_SESSION["bedrag"] = 70;
            header("location: bevestig.php");
            break;

        case '4':
            header("location: help.php");
            break;

        case 'D':
            header("location: ../index.php");
            break;
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>pin invoeren</title>
    <link href="../CSS/menu.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="0.2">
</head>
<body>
<div class="buttons">
    <button class="home">
        <a href="../index.php"><img src="../Pictures/algemeen/home_button.png"
                                    class="home_button"></a>
        <h3><?php echo $afbreken ?><br> D</h3>
    </button>
</div>


<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>
        <br>
        <h2><?php echo $keuze?></h2>
        <br><br><br>

        <button class="keuze">
            <a href="../php/saldo_opvragen.php"><img src="<?php echo $saldo?>"
                                     class="keuze_button"></a>
            <h3>1</h3>
        </button>

        <button class="keuze">
            <a href="opnemen.php"><img src="<?php echo $opnemen?>"
                                       class="keuze_button"></a>
            <h3>2</h3>
        </button>
        <button class="keuze">
            <img src="<?php echo $zeventig?>"
                 class="keuze_button">
            <h3>3</h3>
        </button>

        <button class="keuze">
            <a href="help.php"><img src="<?php echo $help?>"
                                    class="keuze_button"></a>
            <h3>4</h3>
        </button>
    </section>
</div>
</body>
</html>
