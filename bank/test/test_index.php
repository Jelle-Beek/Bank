<?php
include "../php/var.php";

$_SESSION["pin"] = NULL;

if ($_SESSION['pasnummer'] != "..........." && $_SESSION['pasnummer'] != "" && $_SESSION["pin"] != NULL) {
    header("location: html/pin_invoeren.php");
}


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

?>

<!DOCTYPE html>
<html>
<head>
    <title>home</title>
    <link href="../CSS/index.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="buttons">
    <button>
        <a href="../php/nederlands.php"><img src="../Pictures/algemeen/Flag_of_the_Netherlands.svg" alt="Nederlandse Vlag"
                                             class="language"></a>
        <h3>A</h3>
    </button>

    <button>
        <a href="../php/engels.php"><img src="../Pictures/algemeen/Flag_of_the_United_States.JPEG" alt="Flag of the United States"
                                         class="language"></a>
        <h3>B</h3>
    </button>

    <button>
        <a href="../php/duits.php"><img src="../Pictures/algemeen/Flag_of_Germany.JPEG" alt="Deutsche Flagge"
                                        class="language"></a>
        <h3>C</h3>
    </button>
</div>

<div class="main">
    <section>
        <h1>Batbank</h1>
        <h2><a href="../html/pin_invoeren.php"><?php echo $pas?></a></h2>

        <form action="test_inloggen.php" method="post">
            <input type="text" class="input_pin" name="pasnummer" placeholder="Pasnummer"/>

            <input type="password" class="input_pin" name="pincode" placeholder="Pincode" pattern="[0-9]{4}"
                   maxlength="4" required value="<?php echo $_SESSION["pin"]?>"/>
            <br>
            <input type="submit" class="input_ok" value="&#10033   OK">
            <input type="reset" class="input_corr" value="#   CORR">
        </form>
    </section>
</div>
</body>
</html>