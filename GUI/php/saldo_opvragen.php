<?php
include "var.php";

$pasnummer = $_SESSION["pasnummer"];

//check connection
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    $sql = "SELECT saldo FROM rekeningen WHERE Pasnummer = '$pasnummer'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        echo "saldo = " . $row["saldo"];
        echo "<br>Gebruiker gevonden";
        $_SESSION['saldo'] = $row["saldo"];
        header("location: ../html/saldo.php");
    } else {
        echo "geen gebruiker gevonden! [saldo_opvragen.php]";
        echo "<br> pasnummer =" . $pasnummer;
    }
}

?>
