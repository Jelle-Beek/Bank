<?php
include "php/var.php";

// standaard taal op nederlands zetten als deze nog niet is aangegeven
if ($_SESSION["taal"] == null) {
    $_SESSION["taal"] = "Nederlands";
}

// als pas is gescant dan wordt je doorgestuurd naar pin_invoeren
if ($_SESSION['pasnummer'] != "................" && $_SESSION['pasnummer'] != "") {
    header("location: html/pin_invoeren.php");
}

// pin reseten
$_SESSION["pin"] = NULL;
$_SESSION["error"] = NULL;


// check om te zien welke key is ingedrukt
if (ctype_alnum($_SESSION["key"])) {
    switch ($_SESSION["key"]) {
        case 'A':
            $_SESSION["taal"] = "Nederlands";
            break;

        case 'B':
            $_SESSION["taal"] = "Engels";
            break;

        case 'C':
            $_SESSION["taal"] = "Duits";
            break;
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>home</title>
    <link href="CSS/index.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="0.2">
</head>
<body>
<div class="buttons">
    <button>
        <img src="Pictures/algemeen/Flag_of_the_Netherlands.svg" alt="Nederlandse Vlag" class="language">
        <h3>Nederlands:<br> A</h3>
    </button>

    <button>
        <img src="Pictures/algemeen/Flag_of_the_United_States.JPEG" alt="Flag of the United States" class="language">
        <h3>English:<br> B</h3>
    </button>

    <button>
       <img src="Pictures/algemeen/Flag_of_Germany.JPEG" alt="Deutsche Flagge" class="language">
        <h3>Deutsch:<br> C</h3>
    </button>
</div>

<div class="main">
    <section>
        <h1>Batbank</h1>
        <h2><?php echo $pas ?></h2>
    </section>
</div>
</body>
</html>