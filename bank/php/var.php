<?php
session_id("batbank");
session_start();

switch ($_SESSION["taal"]) {
    case "Nederlands":
        $terug = "Terug:";
        $afbreken = "Afbreken:";
        break;
    case "Engels":
        $terug = "Back:";
        $afbreken = "Abort:";
        break;
    case "Duits":
        $terug = "Zur&uuml;ck:";
        $afbreken = "Abbrechen:";
        break;
}

?>
