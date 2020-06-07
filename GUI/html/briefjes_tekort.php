<?php
include "../php/var.php";
if (ctype_alnum($_SESSION["key"])) {
    switch ($_SESSION["key"]) {
        case 'C':
            $_SESSION["key"] = NULL;
            header("location: menu.php");
            break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>pin invoeren</title>
    <link href="../CSS/tekort.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="0.2">
</head>
<body>

<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>
        <br>
        <h2 style="color: red"><?php echo $error_briefjes ?></h2>
        <br><br><br>


        <button class="keuze">
            <a href="menu.php"> <img src="<?php echo $doorgaan ?>"
                                     class="keuze_button"> </a>

            <h3>C</h3>
        </button>
    </section>
</div>
</body>
</html>
