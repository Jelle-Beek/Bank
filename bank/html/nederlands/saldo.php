<?php
session_id("batbank");
session_start();

$_SESSION['saldo'] = 1000;

if (ctype_alnum($_SESSION["key"])) {
    switch ($_SESSION["key"]) {
        case 'C':
            header("location: menu.php");
            break;

        case 'D':
            header("location: ../../index.php");
            break;
    }
}

switch ($_SESSION["taal"]){
    case "Nederlands":
        $uwSaldo = "Uw saldo is:";
        break;
    case "Engels":
        $uwSaldo = "Your balance is:";
        break;
    case "Duits":
        $uwSaldo = "Ihr Gleichgewicht ist:";
        break;
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>saldo</title>
    <link href="../../CSS/saldo.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="1" >
</head>
<body>
<div class="buttons">
    <button>
        <a href="../../index.php"><img src="../../Pictures/algemeen/home_button.png"
                                       class="home_button"></a>
        <h3>D</h3>
    </button>

    <button>
        <a href="menu.php"><img src="../../Pictures/algemeen/left-teal-arrow.png"
                                 class="home_button"></a>
        <h3>C</h3>
    </button>
</div>

<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>
        <br>
        <h2 style="font-size: 60px"><?php echo $uwSaldo?>></h2>

        <h2>&euro;<?php echo $_SESSION['saldo']; ?></h2>

        <br><br>
        <img src="../../Pictures/algemeen/wallet.png" alt="Wallet" style="width: 70%">
    </section>
</div>
</body>
</html>