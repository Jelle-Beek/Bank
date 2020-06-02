<?php
session_id("batbank");
session_start();

$host = "localhost";
$dbUsername = "root";
$dbPassword = "Bank@Y44n72";
$dbName = "batbank";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

switch ($_SESSION["taal"]) {
    case "Nederlands":
        $pas = "Pas invoegen a.u.b.";
        $terug = "Terug:";
        $afbreken = "Afbreken:";
        $uwSaldo = "Uw saldo is:";
        $invoeren_pin = "Voer uw pincode in a.u.b.";
        $geheim = "Houd uw pincode geheim. Laat niemand meekijken.";
        $keuze = "Maak uw keuze:";
        $anders = "../Pictures/nederlands/anders.png";
        $saldo = "../Pictures/nederlands/saldo.png";
        $opnemen = "../Pictures/nederlands/opnemen.png";
        $zeventig = "../Pictures/nederlands/70_euro.png";
        $help = "../Pictures/nederlands/Help.png";
        $hulp = "Voor hulp kunt u:";
        $mail = "Het volgende e-mailadress mailen:  0984233@hr.nl";
        $telnr = "Het volgende nummer bellen:<br> +31 681757734";
        $keuze_bon = "Wilt u de transactiebon?";
        $ja = "../Pictures/nederlands/ja.png";
        $nee = "../Pictures/nederlands/nee.png";
        $keuze_bevestigen = "Weet u het zeker dat u &euro;" . $_SESSION["bedrag"] . " wilt pinnen?";
        $ja_bevestigen = "../Pictures/nederlands/ja.png";
        $nee_bevestigen = "../Pictures/nederlands/nee.png";
        $invoeren_bedrag = "Voer het bedrag in.";
        $bedrag = "Bedrag";
        $bedankt = "Bedankt voor het pinnen bij Batbank";
        $pas_pakken = "U kunt uw pas pakken";
        $tekort = "U heeft niet genoeg saldo om &euro;" . $_SESSION['bedrag'] . " te pinnen";
        $doorgaan = "../Pictures/nederlands/doorgaan.png";
        break;
    case "Engels":
        $pas = "Please insert your card.";
        $terug = "Back:";
        $afbreken = "Abort:";
        $uwSaldo = "Your balance is:";
        $invoeren_pin = "Please enter your pincode.";
        $geheim = "Keep your pincode secret. Don't let anyone watch.";
        $keuze = "Make your choice:";
        $anders = "../Pictures/engels/otherwise.png";
        $saldo = "../Pictures/engels/balance.png";
        $opnemen = "../Pictures/engels/withdraw.png";
        $zeventig = "../Pictures/engels/withdraw_70_euro.png";
        $help = "../Pictures/engels/Help.png";
        $hulp = "For help, you can:";
        $mail = "Email the following email address: 0984233@hr.nl";
        $telnr = "Call the following number:<br> +31 681757734";
        $keuze_bon = "Would you like the transaction receipt?";
        $ja = "../Pictures/engels/yes.png";
        $nee = "../Pictures/engels/no.png";
        $keuze_bevestigen = "Are you sure you want to withraw &euro;" . $_SESSION["bedrag"] . "?";
        $ja_bevestigen = "../Pictures/engels/yes.png";
        $nee_bevestigen = "../Pictures/engels/no.png";
        $invoeren_bedrag = "Enter the amount.";
        $bedrag = "Amount";
        $bedankt = "Thanks for using Batbank";
        $pas_pakken = "You can take your card";
        $tekort = "You don't have enough balance to withdraw &euro;" . $_SESSION['bedrag'];
        $doorgaan = "../Pictures/engels/continue.png";
        break;
    case "Duits":
        $pas = "Bitte geben Sie Ihre Karte ein.";
        $terug = "Zur&uuml;ck:";
        $afbreken = "Abbrechen:";
        $uwSaldo = "Ihr Gleichgewicht ist:";
        $invoeren_pin = "Bitte geben Sie Ihren PIN-Code ein.";
        $geheim = "Halten Sie Ihre PIN geheim. Lass niemanden zuschauen.";
        $keuze = "Treffen Sie Ihre Wahl:";
        $anders = "../Pictures/duits/sonst.png";
        $saldo = "../Pictures/duits/gleichgewicht.png";
        $opnemen = "../Pictures/duits/aufnehmen.png";
        $zeventig = "../Pictures/duits/70_Euro_aufnehmen.png";
        $help = "../Pictures/duits/helfe.png";
        $hulp = "F&uumlr Hilfe k&oumlnnen Sie:";
        $mail = "Die folgende E-Mail-Adresse <br> e-mailen: 0984233@hr.nl";
        $telnr = "Die folgende Nummer anrufen: <br>+31 681757734";
        $keuze_bon = "Möchten Sie den Transaktionsbeleg?";
        $ja = "../Pictures/duits/ja.png";
        $nee = "../Pictures/duits/nein.png";
        $keuze_bevestigen = "Sind Sie sicher, dass Sie &euro;" . $_SESSION["bedrag"] . " abheben möchten?";
        $ja_bevestigen = "../Pictures/duits/ja.png";
        $nee_bevestigen = "../Pictures/duits/nein.png";
        $invoeren_bedrag = "Geben Sie den Betrag ein.";
        $bedrag = "Betrag";
        $bedankt = "Danke, dass du bei Batbank gepinnt hast";
        $pas_pakken = "Sie können Ihre Karte nehmen";
        $tekort = "Sie haben nicht genug Gleichgewicht, um &euro;" . $_SESSION['bedrag'] . " auf zu nehmen";
        $doorgaan = "../Pictures/duits/fortsetzen.png";
        break;
}
?>
