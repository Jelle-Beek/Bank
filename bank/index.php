<?php
session_id('batbank');
session_start();

if ($_SESSION['pasnummer'] != "...........") {
    header("location: html/nederlands/pin_invoeren.php");
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
        <a href="index.php"><img src="Pictures/algemeen/Flag_of_the_Netherlands.svg" alt="Nederlandse Vlag"
                                 class="language"></a>
        <h3>A</h3>
    </button>

    <button>
        <a href="html/engels/index.php"><img src="Pictures/algemeen/Flag_of_the_United_States.JPEG" alt="Flag of the United States"
                                             class="language"></a>
        <h3>B</h3>
    </button>

    <button>
        <a href="html/duits/index.php"><img src="Pictures/algemeen/Flag_of_Germany.JPEG" alt="Deutsche Flagge"
                                            class="language"></a>
        <h3>C</h3>
    </button>
</div>

<div class="main">
    <section>
        <h1>Batbank</h1>
        <h2><a href="html/nederlands/pin_invoeren.php">Pas</a> invoegen a.u.b.</h2>
    </section>
</div>
</body>
</html>