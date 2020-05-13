<?php
include "../php/var.php";

if (ctype_alnum($_SESSION["key"])) {
    switch ($_SESSION["key"]) {
        case '1':
            header("location: bonprinten.php");
            break;

        case 'C':
        case '2':
            header("location: opnemen.php");
            break;

        case 'D':
            header("location: ../index.php");
            break;
    }
}
$_SESSION["taal"] = "Duits";
$_SESSION["bedrag"] = 100;

switch ($_SESSION["taal"]) {
    case "Nederlands":
        $keuze = "Weet u het zeker dat u $" . $_SESSION["bedrag"] . " wilt pinnen?";
        $ja = "../Pictures/nederlands/ja.png";
        $nee = "../Pictures/nederlands/nee.png";
        break;
    case "Engels":
        $keuze = "Are you sure you want to withraw $" . $_SESSION["bedrag"] . "?";
        $ja = "../Pictures/engels/yes.png";
        $nee = "../Pictures/engels/no.png";
        break;
    case "Duits":
        $keuze = "Sind Sie sicher, dass Sie $" . $_SESSION["bedrag"] . " abheben möchten?";
        $ja = "../Pictures/duits/ja.png";
        $nee = "../Pictures/duits/nein.png";
        break;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>pin invoeren</title>
    <link href="../CSS/bevestig.css" rel="stylesheet" type="text/css"/>
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
        <a href="opnemen.php"><img src="../Pictures/algemeen/left-teal-arrow.png"
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
        <br><br><br><br><br>

        <button class="keuze">
            <a href="bonprinten.php"> <img src="<?php echo $ja ?>"
                                           class="keuze_button"> </a>
            <h3>1</h3>
        </button>

        <button class="keuze">
            <a href="opnemen.php"> <img src="<?php echo $nee ?>"
                                     class="keuze_button"> </a>

            <h3>2</h3>
        </button>
    </section>
</div>
</body>
</html>