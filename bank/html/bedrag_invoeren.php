<?php
session_id("batbank");
session_start();

if (ctype_alnum($_SESSION["key"])) {
    switch ($_SESSION["key"]) {
        case '*':

            break;

        case '#':
            $_SESSION["bedrag"] = NULL;
            break;

        case 'C':
            header("location: opnemen.php");
            break;

        case 'D':
            header("location: ../../index.php");
            break;


        case 0:
        case 1:
        case 2:
        case 3:
        case 4:
        case 5:
        case 6:
        case 7:
        case 8:
        case 9:
            $_SESSION["bedrag"] = $_SESSION["bedrag"] . $_SESSION["key"];
            break;
    }
}

switch ($_SESSION["taal"]){
    case "Nederlands":
        $invoeren = "Voer het bedrag in.";
        $bedrag = "Bedrag";
        break;
    case "Engels":
        $invoeren = "Enter the amount.";
        $bedrag = "Amount";
        break;
    case "Duits":
        $invoeren = "Geben Sie den Betrag ein.";
        $bedrag = "Betrag";
        break;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>pin invoeren</title>
    <link href="../CSS/bedrag_invoeren.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="0.2">
</head>
<body>
<div class="buttons">
    <button>
        <a href="../index.php"><img src="../Pictures/algemeen/home_button.png"
                                    class="home_button"></a>
        <h3>D</h3>
    </button>

    <button>
        <a href="opnemen.php"><img src="../Pictures/algemeen/left-teal-arrow.png"
                                   class="home_button"></a>
        <h3>C</h3>
    </button>
</div>

<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>
        <h2><?php echo $invoeren?></h2>
        <br>
        <form>
            <input type="text" class="input_bedrag" name="Bedrag" placeholder="<?php echo $bedrag?>" maxlength="4"/>
            <br>
            <input type="submit" class="input_ok" value="*   OK">
            <input type="reset" class="input_corr" value="#   CORR">
        </form>

        <br><br><br><br><br><br>
        <a href="menu.php"><img src="../Pictures/algemeen/geld.png" style="width: 60%"></a>
    </section>
</div>
</body>
</html>