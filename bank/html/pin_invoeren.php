<?php
include "../php/var.php";

if (ctype_alnum($_SESSION["key"]) || $_SESSION["key"] == '#' || $_SESSION["key"] == '*') {
    switch ($_SESSION["key"]) {
        case '*':
            header("location: ../php/inloggen.php");
            break;

        case '#':
            $_SESSION["pin"] = NULL;
            break;

        case 'D':
            header("location: ../../index.php");
            break;

        case '0':
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
        case '9':
            if (strlen($_SESSION["pin"]) < 4) {
                $_SESSION["pin"] = $_SESSION["pin"] . $_SESSION["key"];
            }
            break;
    }
}

$_SESSION["key"] = NULL;

switch ($_SESSION["taal"]) {
    case "Nederlands":
        $invoeren = "Voer uw pincode in a.u.b.";
        $geheim = "Houd uw pincode geheim. Laat niemand meekijken.";
        break;
    case "Engels":
        $invoeren = "Please enter your pincode.";
        $geheim = "Keep your pincode secret. Don't let anyone watch.";
        break;
    case "Duits":
        $invoeren = "Bitte geben Sie Ihren PIN-Code ein.";
        $geheim = "Halten Sie Ihre PIN geheim. Lass niemanden zuschauen.";
        break;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>pin invoeren</title>
    <link href="../CSS/pin_invoeren.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="0.2">
</head>
<body>
<div class="buttons">
    <button>
        <a href="../index.php"><img src="../Pictures/algemeen/home_button.png"
                                    class="home_button"></a>
        <h3><?php echo $afbreken ?><br> D</h3>
    </button>
</div>

<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>

        <h2><?php echo $invoeren ?></h2>

        <h2 style="color: orangered"><?php echo $_SESSION["error"] ?></h2>

        <form action="../php/inloggen.php" method="post">
            <input type="text" class="input_pin" name="pincode" placeholder="Pincode" pattern="[0-9]{4}"
                   maxlength="4" value="<?php echo $_SESSION["pin"] ?>"/>
            <br>
            <input type="submit" class="input_ok" value="&#10033   OK">
            <input type="reset" class="input_corr" value="#   CORR">
        </form>
        <br><br>
        <h2 style="color: orangered"><?php echo $geheim ?></h2>

        <a href="menu.php"><img src="../Pictures/algemeen/passcode.png" style="width: 40%"></a>
    </section>
</div>
</body>
</html>