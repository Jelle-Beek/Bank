<?php
session_id('batbank');
session_start();

if ($_SESSION['pasnummer'] != "..........." && $_SESSION['pasnummer'] != "" && $_SESSION["pin"] != NULL) {
    header("location: html/pin_invoeren.php");
}

$_SESSION["pin"] = NULL;
$_SESSION["error"] = NULL;

switch ($_SESSION["key"]) {
    case 'A':
        $_SESSION["taal"] = "Nederlands";
        break;

    case 'B':
        $_SESSION["taal"] = "Engels";
        break;

    case 'c':
        $_SESSION["taal"] = "Duits";
        break;
}

switch ($_SESSION["taal"]){
    case "Nederlands":
        $pas = "Pas invoegen a.u.b.";
        break;
    case "Engels":
        $pas = "Please insert your card.";
        break;
    case "Duits":
        $pas = "Bitte geben Sie Ihre Karte ein.";
        break;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>home</title>
    <link href="CSS/index.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="2" >
</head>
<body>
<div class="buttons">
    <button>
        <a href="php/nederlands.php"><img src="Pictures/algemeen/Flag_of_the_Netherlands.svg" alt="Nederlandse Vlag"
                                          class="language"></a>
        <h3>A</h3>
    </button>

    <button>
        <a href="php/engels.php"><img src="Pictures/algemeen/Flag_of_the_United_States.JPEG" alt="Flag of the United States"
                                      class="language"></a>
        <h3>B</h3>
    </button>

    <button>
        <a href="php/duits.php"><img src="Pictures/algemeen/Flag_of_Germany.JPEG" alt="Deutsche Flagge"
                                     class="language"></a>
        <h3>C</h3>
    </button>
</div>

<div class="main">
    <section>
        <h1>Batbank</h1>
        <h2><a href="html/pin_invoeren.php"><?php echo $pas?></a></h2>
    </section>
</div>
</body>
</html>