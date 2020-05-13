<?php
include "../php/var.php";

if (ctype_alnum($_SESSION["key"])) {
    switch ($_SESSION["key"]) {
        case 'C':
            header("location: menu.php");
            break;

        case 'D':
            header("location: ../../index.php");
            break;
    }
}



switch ($_SESSION["taal"]){
    case "Nederlands":
        $keuze = "Wilt u de transactiebon?";
        $ja = "../Pictures/nederlands/ja.png";
        $nee = "../Pictures/nederlands/nee.png";
        break;
    case "Engels":
        $keuze = "Are you sure?";
        $ja = "../Pictures/engels/yes.png";
        $nee = "../Pictures/engels/no.png";
        break;
    case "Duits":
        $keuze = "Bist du sicher?";
        $ja = "../Pictures/duits/ja.png";
        $nee = "../Pictures/duits/nein.png";
        break;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>pin invoeren</title>
    <link href="../CSS/bonprinten.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="0.2">
</head>
<body>

<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>
        <br>
        <h2><?php echo $keuze?></h2>
        <br><br><br><br><br>

        <button class="keuze">
            <a href="sluiting.php"> <img src="<?php echo $ja?>"
                                class="keuze_button"> </a>
            <h3>1</h3>
        </button>

        <button class="keuze">
           <a href="sluiting.php"> <img src="<?php echo $nee?>"
                                class="keuze_button"> </a>

            <h3>2</h3>
        </button>
    </section>
</div>
</body>
</html>