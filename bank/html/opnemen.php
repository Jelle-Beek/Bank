<?php
include "../php/var.php";

if (ctype_alnum($_SESSION["key"])) {
    switch ($_SESSION["key"]) {
        case 'C':
            header("location: menu.php");
            break;

        case 'D':
            header("location: ../index.php");
            break;

        case '1':
            $_SESSION["key"] = NULL;
            $_SESSION["bedrag"] = 5;
            header("location: bevestig.php");
            break;
        case '2':
            $_SESSION["key"] = NULL;
            $_SESSION["bedrag"] = 10;
            header("location: bevestig.php");
            break;
        case '3':
            $_SESSION["key"] = NULL;
            $_SESSION["bedrag"] = 20;
            header("location: bevestig.php");
            break;
        case '4':
            $_SESSION["key"] = NULL;
            $_SESSION["bedrag"] = 50;
            header("location: bevestig.php");
            break;
        case '5':
            $_SESSION["key"] = NULL;
            $_SESSION["bedrag"] = NULL;
            header("location: bedrag_invoeren.php");
            break;
    }
}




?>

<!DOCTYPE html>
<html>
<head>
    <title>pin invoeren</title>
    <link href="../CSS/opnemen.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="0.2">
</head>
<body>
<div class="buttons">
    <button class="home">
        <a href="../index.php"><img src="../Pictures/algemeen/home_button.png"
                                    class="home_button"></a>
        <h3><?php echo $afbreken ?><br> D</h3>
    </button>

    <button class="home">
        <a href="menu.php"><img src="../Pictures/algemeen/left-teal-arrow.png"
                                class="home_button"></a>
        <h3><?php echo $terug ?><br> C</h3>
    </button>
</div>

<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>
        <br>
        <h2><?php echo $keuze ?></h2>
        <br><br><br>

        <button class="keuze">
            <img src="../Pictures/algemeen/5_euro.png"
                 class="keuze_button">
            <h3>1</h3>
        </button>

        <button class="keuze">
            <img src="../Pictures/algemeen/10_euro.png"
                 class="keuze_button">
            <h3>2</h3>
        </button>
        <button class="keuze">
            <img src="../Pictures/algemeen/20_euro.png"
                 class="keuze_button">
            <h3>3</h3>
        </button>

        <button class="keuze">
            <img src="../Pictures/algemeen/50_euro.png"
                 class="keuze_button">
            <h3>4</h3>
        </button>

        <button class="keuze">
            <a href="bedrag_invoeren.php"> <img src="<?php echo $anders ?>"
                                                class="keuze_button"> </a>
            <h3>5</h3>
        </button>
    </section>
</div>
</body>
</html>