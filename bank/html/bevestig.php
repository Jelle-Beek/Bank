<?php
include "../php/var.php";

$pasnummer = $_SESSION["pasnummer"];
$pincode = $_SESSION["pin"];

//check connection
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    $sql = "SELECT Saldo FROM rekeningen WHERE Pasnummer = '$pasnummer' AND Pincode = '$pincode'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result)["Saldo"];

        if ($_SESSION["bedrag"] > $row) {
            $location = "location: ../html/tekort.php";
        } else {
            $location = "location: ../html/bonprinten.php";
        }

    } else {
        echo "geen gebruiker gevonden! [tekort.php]";
        echo "<br> pasnummer =" . $pasnummer;
        echo "<br> pincode =" . $pincode;
    }
}

if (ctype_alnum($_SESSION["key"])) {
    switch ($_SESSION["key"]) {
        case '1':
            $_SESSION["key"] = NULL;
            header($location);
            break;

        case 'C':
        case '2':
            $_SESSION["key"] = NULL;
            header("location: opnemen.php");
            break;

        case 'D':
            header("location: ../index.php");
            break;
    }
}

echo $_SESSION["bedrag"] . " " . $row["Saldo"]

?>

<!DOCTYPE html>
<html>
<head>
    <title>pin invoeren</title>
    <link href="../CSS/bevestig.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="0.2">
</head>
<body>
<div class="buttons">
    <button class="home">
        <a href="../index.php"><img src="../Pictures/algemeen/home_button.png"
                                    class="home_button"></a>
        <h3><?php echo $afbreken ?><br> D</h3>
    </button>

    <button class="home">
        <a href="opnemen.php"><img src="../Pictures/algemeen/left-teal-arrow.png"
                                   class="home_button"></a>
        <h3><?php echo $terug ?><br> C</h3>
    </button>
</div>

<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>
        <br>
        <h2><?php echo $keuze_bevestigen ?></h2>
        <br><br><br><br><br>

        <button class="keuze">
            <a href="bonprinten.php"> <img src="<?php echo $ja_bevestigen ?>"
                                           class="keuze_button"> </a>
            <h3>1</h3>
        </button>

        <button class="keuze">
            <a href="opnemen.php"> <img src="<?php echo $nee_bevestigen ?>"
                                        class="keuze_button"> </a>

            <h3>2</h3>
        </button>
    </section>
</div>
</body>
</html>