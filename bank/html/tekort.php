<?php
include "../php/var.php";

if (ctype_alnum($_SESSION["key"])) {
    switch ($_SESSION["key"]) {
        case 'A':
            $_SESSION["key"] = NULL;
            header("location: menu.php");
            break;
    }
}

$pasnummer = $_SESSION["pasnummer"];
$pincode = $_SESSION["pin"];

//check connection
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    $sql = "SELECT saldo FROM rekeningen WHERE Pasnummer = '$pasnummer' AND Pincode = '$pincode'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        echo "saldo = " . $row["saldo"];
        $_SESSION['saldo'] = $row["saldo"];
    } else {
        echo "geen gebruiker gevonden! [tekort.php]";
        echo "<br> pasnummer =" . $pasnummer;
        echo "<br> pincode =" . $pincode;
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
        <h2><?php echo $tekort ?></h2>
        <h2><?php echo $uwSaldo . " &euro;".$_SESSION['saldo'];?></h2>
        <br><br><br><br><br>


        <button class="keuze">
            <a href="menu.php"> <img src="<?php echo $doorgaan ?>"
                                        class="keuze_button"> </a>

            <h3>A</h3>
        </button>
    </section>
</div>
</body>
</html>
