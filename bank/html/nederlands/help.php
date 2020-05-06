<?php
session_id("batbank");
session_start();

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
        $hulp = "Voor hulp kunt u:";
        $mail = "Het volgende emailadress mailen:  0984233@hr.nl";
        $telnr = "Het volgende nummer bellen: 0681757734";
        break;
    case "Engels":
        $hulp = "For help, contact us by:";
        $mail = "Mailing to:  0984233@hr.nl";
        $telnr = "Calling the number:   0681757734";
        break;
    case "Duits":
        $hulp = "F&uumlr Hilfe k&oumlnnen Sie:";
        $mail = "Die folgende E-Mail-Adresse e-mailen: <br>0984233@hr.nl";
        $telnr = "Die folgende Nummer anrufen: <br>0681757734";
        break;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>saldo</title>
    <link href="../../CSS/help.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="1" >
</head>
<body>
<div class="buttons">
    <button>
        <a href="../../index.php"><img src="../../Pictures/algemeen/home_button.png"
                                       class="home_button"></a>
        <h3>D</h3>
    </button>

    <button>
        <a href="menu.php"><img src="../../Pictures/algemeen/left-teal-arrow.png"
                                class="home_button"></a>
        <h3>C</h3>
    </button>
</div>

<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>
        <br><br><br>
        <h2><?php echo $hulp?></h2><br>
        <h2><?php echo $mail?></h2>
        <h2><?php echo $telnr?></h2>
    </section>
</div>
</body>
</html>