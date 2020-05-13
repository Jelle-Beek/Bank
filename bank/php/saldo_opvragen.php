<?php
include "var.php";

$pasnummer = "0984223";
$pincode = "0984";

//check connection
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    $sql = "SELECT saldo FROM rekeningen WHERE Pasnummer = '$pasnummer' AND Pincode = '$pincode'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        echo "saldo = " . $row["saldo"];
        echo "<br>Gebruiker gevonden";
        $_SESSION['saldo'] = $row["saldo"];
        header("location: ../html/saldo.php");
    } else {
        echo "geen gebruiker gevonden! [salo_opvragen.php]";
        echo "<br> pasnummer =" . $pasnummer;
        echo "<br> pincode =" . $pincode;
    }
}

?>
